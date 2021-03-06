<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Services\Experiences\ExperienceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $experiences = $this->service->getById($request->id);
        if (isset($experiences)) {
            $experiences['startDate'] = Carbon::parse($experiences->start_date)->format('Y-m-d');
            if ($experiences->end_date === null) {
                $experiences['endDate'] = null;
            } else {
                $experiences['endDate'] = Carbon::parse($experiences->end_date)->format('Y-m-d');
            }
        }
        return success($experiences);
    }

    public function destroy(Request $request)
    {
        return parent::delete($request);
    }
}
