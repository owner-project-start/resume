<?php

namespace App\Services\Interests;

use App\Interest;
use App\Services\BaseService;

class InterestService extends BaseService
{
    public function __construct(Interest $interest)
    {
        $this->model = $interest;
    }
}
