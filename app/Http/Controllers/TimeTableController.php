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

    public function automata(Request $request)
    {
        if ($request->action === "non_modular") {
            $pq = TimeTableBrainPSRed::automata_nonmodular ();
        } else {

        }

        return $pq;
    }

    public function minimalShapingWithID(Request $request)
    {
        $mm = TimeTableBrainPSRed::minimalShapingWithID ( $request->teacher_id );
        return response ( $mm );
    }

    public function shaping()
    {
        $sh = TimeTableBrainPSRed::shaping ();
        return $sh;
    }

    public function minimalShaping()
    {
        $mS = TimeTableBrainPSRed::minimalShaping ();
        return $mS;
    }

    public function weekdayUnDuplicator()
    {
        $wUD = TimeTableBrainPSRed::weekdayUnDuplicator ();
        return $wUD;
    }

    public function weekdaySearcher()
    {
        $wS = TimeTableBrainPSRed::weekdaySearcher ();
        return $wS;
    }

    public function countLectBurden()
    {
        $cLB = TimeTableBrainPSRed::countLectBurden ();
        return $cLB;
    }
}
