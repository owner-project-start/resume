<?php

namespace App\Services\Educations;

use App\Education;
use App\Services\BaseService;

class EducationService extends BaseService
{
    public function __construct(Education $education)
    {
        $this->model = $education;
    }
}
