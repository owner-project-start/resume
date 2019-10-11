<?php

namespace App\Services;

class BaseService
{
    protected $model;

    public function create($attributes)
    {
        if (!$attributes) {
            return false;
        }
        return $this->model->create($attributes);
    }

    public function updateOrCreate($attributes)
    {
        if (!$attributes) {
            return false;
        }
        return $this->model->updateOrCreate($attributes);
    }

    public function updateById($id, $attribute)
    {
        $modelObj = $this->getById($id);
        if (!$modelObj) {
            return false;
        }
        $result = $modelObj->fill($attribute);
        $result->update();
        return $result;
    }

    public function getById($id)
    {
        return $this->model->find($id);

    }

    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result instanceof $this->model) {
            $result->delete();
            return $result;
        }
        return false;
    }

    public function getList()
    {
        return $this->model->all()->toArray();
    }

    public function getSchema()
    {
        return $this->model->getTableColumns();
    }

    public function getTableHeader()
    {
        return $this->model->getTableHeaders();
    }
}
