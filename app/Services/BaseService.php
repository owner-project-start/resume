<?php

namespace App\Services;

class BaseService
{
    protected $model;

    public function getList()
    {
        $list = $this->model->orderBy('updated_at', 'desc')->get();
        return $list;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes)
    {
        if (!$attributes) {
            return false;
        }
        return $this->model->create($attributes);
    }
}
