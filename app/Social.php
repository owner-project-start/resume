<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends ParentModel
{
    protected $fillable = ['user_id', 'icon', 'link'];

    public $rulesToCreate = [

    ];

    public $rulesToUpdate = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
