<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constraint;

class TimeTableController extends Controller
{
    public function index(){
        return view('management.timetable')->with('title','ตารางสอน');
    }

    public function modular_view(){
        return view('management.timetable.module.index')->with('title','ตารางสอนแบบโมดูล');
    }

    public function normal_view(){
        return view('management.timetable.normal.index')->with('title','ตารางสอนแบบปกติ');
    }
}
