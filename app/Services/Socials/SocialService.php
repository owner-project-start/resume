<?php

namespace App\Services\Socials;

use App\Services\BaseService;
use App\Social;

class SocialService extends BaseService
{
    public function __construct(Social $social)
    {
        $this->model = $social;
    }
}
