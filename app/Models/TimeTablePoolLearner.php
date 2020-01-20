<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTablePoolLearner extends Model
{
    protected $table = "timetable_pool_learning";
    public $timestamps = false;
    protected $fillable = ['subject_id' , 'teacher_id' , 'weekday' , 'start_time' , 'end_time' , 'indicator'];

    public function thisBelong()
    {
        return $this->belongsTo ( 'App\Models\Subject' , 'subject_id' );
    }
}
