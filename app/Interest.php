<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends ParentModel
{
    protected $fillable = ['user_id', 'description'];

    public $rulesToCreate = [

    ];

    public $rulesToUpdate = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
