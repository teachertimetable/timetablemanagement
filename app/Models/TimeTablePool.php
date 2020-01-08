<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTablePool extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $table = "timetable_pool";
    protected $fillable = [
        'subject_id' , 'teacher_id' , 'start_time' , 'end_time' , 'duration' , 'indicator'
    ];
}
