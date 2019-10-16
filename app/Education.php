<?php

namespace App;

class Education extends ParentModel
{
    protected $table = 'educations';
    protected $fillable = [
        'user_id',
        'study_at',
        'degree',
        'description',
        'from',
        'to'
    ];

    public $rulesToCreate = [

    ];

    public $rulesToUpdate = [
        'id' => "required|integer",
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
