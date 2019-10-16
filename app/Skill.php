<?php

namespace App;

class Skill extends ParentModel
{
    protected $fillable = ['user_id', 'name', 'active'];

    public $rulesToCreate = [

    ];

    public $rulesToUpdate = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
