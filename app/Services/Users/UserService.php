<?php

namespace App\Services\Users;

use App\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __construct(User $scoreColumn)
    {
        $this->model = $scoreColumn;
    }
}
