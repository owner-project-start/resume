<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Services\Experiences\ExperienceService;

class ExperienceController extends ParentController
{
    public function __construct(Experience $experience, ExperienceService $experienceService)
    {
        $this->model = $experience;
        $this->service = $experienceService;
    }
    public function index()
    {
        return view('pages.experiences.index');
    }


    public function getExperience()
    {

    }
    public function all()
    {
        return parent::all();
    }
}
