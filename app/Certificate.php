<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['user_id', 'name', 'from', 'link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
