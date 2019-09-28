<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::with([
            'socials',
            'experiences',
            'skills',
            'certificates',
            'interests',
            'educations'
        ])
            ->where('status', '=', true)
            ->first();
        return view('index', compact('user'));
    }
}
