<?php

namespace App\Http\Controllers;

use App\Services\Socials\SocialService;
use App\Social;
use Illuminate\Http\Request;

class SocialController extends ParentController
{
    public function __construct(Social $social, SocialService $socialService)
    {
        $this->model = $social;
        $this->service = $socialService;
    }

    public function index()
    {
        return view('pages.socials.index');
    }

    public function all()
    {
        return parent::all();
    }

    public function store(Request $request)
    {
        return parent::store($request);
    }

    public function getById(Request $request) {
        $skill = $this->service->getById($request->id);
        if ($skill instanceof $this->model){
            return success($skill);
        } else {
            return error_notFound($skill);
        }
    }

    public function destroy(Request $request)
    {
        return parent::delete($request);
    }
}
