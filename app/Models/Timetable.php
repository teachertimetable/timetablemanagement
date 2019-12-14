<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = "timetable_main";
    protected $fillable =
        [
            'timetable_name' , 'timetable_info' , 'user_id'
        ];
    public $timestamps = true;
}
