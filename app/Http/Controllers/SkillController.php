<?php

namespace App\Http\Controllers;

use App\Services\Skills\SkillService;
use App\Skill;
use Illuminate\Http\Request;

class SkillController extends ParentController
{
    public function __construct(Skill $skill, SkillService $skillService)
    {
        $this->model = $skill;
        $this->service = $skillService;
    }

    public function index()
    {
        return view('pages.skills.index');
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
