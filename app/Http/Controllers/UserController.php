<?php

namespace App\Http\Controllers;

use App\Services\Users\UserService;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends ParentController
{
    public function __construct(User $user, UserService $userService)
    {
        $this->model = $user;
        $this->service = $userService;
    }

    private function checkStatus($input)
    {
        if ($input === null) {
            $input = 0;
        }
        return $input;
    }

    /**
     * @return Factory|View
     */
    public function profile()
    {
        $user = $this->service->getById(Auth::user()->getAuthIdentifier());
        if ($user instanceof $this->model) {
            toastSuccess('Success get user');
            return view('pages.profiles.index',[
                'user' => $user,
            ]);
        } else {
            toastError('Error get user');
            return view('pages.profiles.index', [
                'user' => [],
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateProfile(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            DB::beginTransaction();
            $input = $request->all();
            $attributes['status'] = $this->checkStatus($request['status']);
            $userObject = $this->service->getById($id);
            if ($userObject instanceof $this->model) {
                $userObject->update($input);
                DB::commit();
                return success_update($input, 'User');
            } else {
                DB::rollBack();
                return error_notFound('user');
            }
        } catch (ValidationException $validate) {
            DB::rollBack();
            return error_validate($validate->errors());
        }
    }

    public function updateAvatar(Request $request, $id)
    {
        $user = $this->service->getById($id);
        if ($user instanceof $this->model) {
            $avatar = $request->input('avatar');
            $avatar = str_replace('data:image/jpeg;base64,', '', $avatar);
            $avatar = str_replace(' ', '+', $avatar);
            $name = time() . '.' . 'png';
            $folder = '/storage/users';
            $avatarName = $folder . '/' . $name;
            File::put(public_path($folder) . '/' . $name, base64_decode($avatar));
            $userAvatar = $user->avatar;
            if (File::exists(public_path($userAvatar))) {
                File::delete(public_path($userAvatar));
            }
            $user->update([
                'avatar' => $avatarName
            ]);
            return success_update($userAvatar, 'avatar');
        }
        return error_notFound('User');
    }
}
