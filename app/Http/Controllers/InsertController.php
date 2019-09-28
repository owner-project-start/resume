<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InsertController extends Controller
{

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
