<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $rulesToCreate = [];
    public $rulesToUpdate = [];
    public $rulesToDelete = [];

    /* Overriding functions*/
//    public static function boot()
//    {
//        static::saved(function () {
//            Cache::forget('models' . with(new static )->getTable() . 'all');
//        });
//        parent::boot();
//    }
//
//    public static function all($columns = ['*'])
//    {
//        return Cache::remember('models' . with(new static )->getTable() . 'all', 10, function () use ($columns) {
//            return parent::all($columns);
//        });
//    }
}
