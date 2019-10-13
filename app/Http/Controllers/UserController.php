<?php

namespace App\Http\Controllers;

use App\Services\Users\UserService;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends ParentController
{
    public function __construct(User $user, UserService $userService)
    {
        $this->model = $user;
        $this->service = $userService;
    }

    /**
     * @return Factory|View
     */
    public function profile()
    {
        $user = $this->service->getById(Auth::user()->getAuthIdentifier());
        if ($user instanceof User) {
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
            $attributes = $request->all();
            dd($attributes);
            $attributes['status'] = $this->service->checkStatus($request['status']);
            $updatedObject = $this->service->updateById($attributes, $id);
            if ($updatedObject) {
                return success_update($updatedObject);
            }
            return $this->error();
        } catch (ValidationException $validate) {
            DB::rollBack();
            return error_validate($validate->errors());
        }
    }

    public function updateAvatar(Request $request, $id)
    {
        return success_update($request->all());
    }
}
