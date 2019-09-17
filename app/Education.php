<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'user_id',
        'study_at',
        'level',
        'content',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
