<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    public $timestamps = true;
    protected $table = "constraint_teacher";
    protected $primaryKey = "id";
    protected $fillable = [
        'constraint_title' , 'teacher_id' , 'weekday' , 'start_time' , 'end_time'
    ];

    public function have()
    {
        return $this->hasOne ( 'App\Models\Subject' );
    }
}
