<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends ParentModel
{
    protected $fillable = ['user_id', 'name', 'from', 'link'];

    public $rulesToCreate = [

    ];

    public $rulesToUpdate = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
