<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeFit extends Model
{
    public $timestamps = false;
    protected $table = "timefit_pool";
    protected $fillable = ["start_time" , "end_time" , "fit_duration" , "teacher_id" , "weekday"];
}
