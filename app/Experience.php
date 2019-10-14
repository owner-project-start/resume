<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends ParentModel
{
    protected $table = 'experiences';
    protected $fillable = [
        'user_id',
        'position',
        'company',
        'content',
        'start_date',
        'end_date'
    ];
    protected $dates = ['start_date', 'end_date'];
//    protected $casts = [
//        'start_date' => 'date:d/m/Y',
//        'end_date' => 'date:d/m/Y',
//    ];

    public $rulesToCreate = [

    ];

    public $rulesToUpdate = [
        'id' => "required"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
