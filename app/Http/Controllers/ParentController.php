<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ParentController extends Controller
{
    use ResponseTrait;
    protected $service;
    protected $model;

    public function all()
    {
        return $this->success($this->service->getList());
    }

    public function update()
    {

    }
}
