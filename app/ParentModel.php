<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ParentModel extends Model
{
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $rulesToCreate = [];
    public $rulesToUpdate = [];
    public $rulesToDelete = [
        'id' => "required|integer"
    ];
}
