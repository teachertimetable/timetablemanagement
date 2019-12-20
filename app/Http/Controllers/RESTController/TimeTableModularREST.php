<?php

namespace App\Http\Controllers\RESTController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeTableModularREST extends Controller
{
    public function index()
    {
        return view ( 'management.timetable.module.index' )->with ( 'title' , 'รายวิชาแบบโมดูลา' );
    }
}
