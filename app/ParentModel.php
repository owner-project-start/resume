<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentModel extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $rulesToCreate = [];
    public $rulesToUpdate = [];
    public $rulesToDelete = [
        'id' => "required|integer"
    ];
}
