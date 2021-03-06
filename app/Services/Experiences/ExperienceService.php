<?php

namespace App\Services\Experiences;

use App\Experience;
use App\Services\BaseService;

class ExperienceService extends BaseService
{
    public function __construct(Experience $experience)
    {
        $this->model = $experience;
    }
}
