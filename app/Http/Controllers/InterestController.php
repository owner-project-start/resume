<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Services\Interests\InterestService;
use Illuminate\Http\Request;

class InterestController extends ParentController
{
    public function __construct(Interest $interest, InterestService $interestService)
    {
        $this->model = $interest;
        $this->service = $interestService;
    }

    public function index()
    {
        return view('pages.interests.index');
    }

    public function all()
    {
        return parent::all();
    }

    public function store(Request $request)
    {
        return parent::store($request);
    }

    public function getById(Request $request)
    {
        return parent::getById($request);
    }

    public function destroy(Request $request)
    {
        return parent::delete($request);
    }
}
