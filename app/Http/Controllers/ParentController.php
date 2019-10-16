<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ParentController extends Controller
{
    use ResponseTrait;
    protected $service;
    protected $model;

    public function all()
    {
        $list = $this->service->getList();
        return $this->success($list);
    }

    public function store(Request $request)
    {
        try {
            if (isset($request->id)) {
                $this->validate($request, $this->model->rulesToUpdate);
                DB::beginTransaction();
                $objectUpdate = $this->service->getById($request->id);
                if ($objectUpdate instanceof $this->model) {
                    $objectUpdate->update($request->all());
                    DB::commit();
                    return success_update($objectUpdate);
                } else {
                    return error_notFound($objectUpdate);
                }
            } else {
                $this->validate($request, $this->model->rulesToCreate);
                DB::beginTransaction();
                $request['user_id'] = Auth::user()->getAuthIdentifier();
                $object = $this->service->create($request->all());
                if ($object instanceof $this->model) {
                    DB::commit();
                    return success_create($object);
                } else {
                    DB::rollBack();
                    return error_notFound($object);
                }
            }
        } catch (ValidationException $validate) {
            DB::rollBack();
            return error_validate($validate->errors());
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->validate($request, $this->model->rulesToDelete);
            DB::beginTransaction();
            $object = $this->service->getById($request->id);
            if ($object instanceof $this->model) {
                $object->delete();
                DB::commit();
                return success_delete($object);
            } else {
                DB::rollBack();
                $object = $this->service->create($request->all());
                return error_notFound($object);
            }
        } catch (ValidationException $validate) {
            DB::rollBack();
            return error_validate($validate->errors());
        }
    }

    public function getById(Request $request) {
        $skill = $this->service->getById($request->id);
        if ($skill instanceof $this->model){
            return success($skill);
        } else {
            return error_notFound($skill);
        }
    }
}
