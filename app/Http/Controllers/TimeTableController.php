<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constraint;

class TimeTableController extends Controller
{
    public function index(){
        return view('management.timetable')->with('title','ตารางสอน');
    }
}
