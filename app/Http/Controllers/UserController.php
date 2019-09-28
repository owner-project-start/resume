<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    private function checkStatus($input)
    {
        if ($input === null)
        {
            $input = 0;
        }
        return $input;
    }

    /**
     * @return Factory|View
     */
    public function profile()
    {
        $user = User::find(Auth::user()->getAuthIdentifier());
        if ($user instanceof User)
        {
            return view('pages.profiles.index',[
                'user' => $user,
                'message' => 'Success get user'
            ]);
        } else {
            return view('pages.profiles.index', [
                'user' => [],
                'message' => 'Error get user'
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateProfile(Request $request, $id) {
        $input = $request->all();
        $input['status'] = $this->checkStatus($request['status']);
        $user = User::find($id);
        if ($user instanceof User)
        {
            $user->update($input);
            return back()->with([
                'user' => $user,
                'message' => 'Success updated'
            ]);
        }
    }
}
