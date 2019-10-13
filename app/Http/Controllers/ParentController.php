<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;

class ParentController extends Controller
{
    use ResponseTrait;
    protected $service;
    protected $model;

    public function all()
    {
        return $this->success($this->service->getList());
    }
}
