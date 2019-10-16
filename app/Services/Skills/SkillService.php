<?php

namespace App\Services\Skills;

use App\Services\BaseService;
use App\Skill;

class SkillService extends BaseService
{
    public function __construct(Skill $skill)
    {
        $this->model = $skill;
    }
}
