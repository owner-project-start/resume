<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['user_id', 'name', 'active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
