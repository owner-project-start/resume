<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index()
    {
        return view('pages.interests.index');
    }
}
