<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Brain\TimeTableBrainPSRed;
use App\Models\TeacherInfo;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function index()
    {
        return view ( 'management.timetable' )->with ( 'title' , 'ตารางสอน' );
    }

    /** PRESERVED FOR ROUTE IN WEB */
    public function normalview()
    {
        $title = "รายวิชาตามตารางสอน";
        $teacher = TeacherInfo::query ()->get ();
        return view ( 'management.timetable.normal.index' , compact ( 'title' , 'teacher' ) );
    }

    public function modularview()
    {
        return view ( 'management.timetable.module.index' )->with ( 'title' , 'รายวิชาแบบโมดูลา' );
    }

    /** PRESERVED FOR ROUTE IN WEB */

    public function automata()
    {
        $pq = TimeTableBrainPSRed::automata_nonmodular ();
        return $pq;
    }

    public function minimalShapingWithID(Request $request)
    {
        $mm = TimeTableBrainPSRed::minimalShapingWithID ( $request->teacher_id );
        return $mm;
    }
}
