<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsertController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function profile()
    {
        $user = User::find(Auth::user()->getAuthIdentifier());
        if ($user instanceof User)
        {
            return view('pages.profile', compact('user'));
        }
    }

    public function insertExperience()
    {
        //
    }

    public function insertEducation()
    {
        //
    }

    public function insertInterest()
    {
        //
    }

    public function insertCertificate()
    {
        //
    }

    public function insertSkill()
    {
        return view('pages.skills.index');
    }
}
