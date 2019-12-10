<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    public $timestamps = true;
    protected $table = "constraints_teacher";
    protected $primaryKey = "id";
    protected $fillable = [
        'constraints_title' , 'teacher_id' , 'weekday' , 'start_time' , 'end_time'
    ];

    public function have()
    {
        return $this->belongsTo ( 'App\Models\TeacherInfo' , 'teacher_id' );
    }
}
