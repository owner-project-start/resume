<?php

namespace App\Services;

class BaseService
{
    protected $model;

    public function getList()
    {
        return $this->model->all()->toArray();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function checkStatus($input)
    {
        if ($input === null) {
            $input = 0;
        }
        return $input;
    }

    public function create($attributes)
    {
        if (!$attributes) {
            return false;
        }
        return $this->model->create($attributes);
    }

    public function updateById($attribute, $id)
    {
        $modelObj = $this->getById($id);
        if (!$modelObj) {
            return false;
        }
        $result = $modelObj->fill($attribute);
        $result->update();
        return $result;
    }
}
