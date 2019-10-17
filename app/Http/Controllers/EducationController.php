<?php

namespace App\Http\Controllers;

use App\Education;
use App\Services\Educations\EducationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EducationController extends ParentController
{
    public function __construct(Education $education, EducationService $educationService)
    {
        $this->model = $education;
        $this->service = $educationService;
    }

    public function index()
    {
        return view('pages.educations.index');
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
        $education = $this->service->getById($request->id);
        if (isset($education)) {
            $education['startDate'] = Carbon::parse($education->start_date)->format('Y-m-d');
            if ($education->from === null) {
                $education['from'] = null;
            } else {
                $education['to'] = Carbon::parse($education->end_date)->format('Y-m-d');
            }
        }
        return success($education);
    }

    public function destroy(Request $request)
    {
        return parent::delete($request);
    }
}
