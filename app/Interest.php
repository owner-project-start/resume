<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = ['user_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
