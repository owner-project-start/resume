<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends ParentModel
{
    use SoftDeletes;
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

    public $rulesToCreate = [
        'position' => 'required',
        'company' => 'required',
        'content' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'date',
    ];

    public $rulesToUpdate = [
        'id' => "required|integer",
        'position' => 'required',
        'company' => 'required',
        'content' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
