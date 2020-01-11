<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Brain\TimeTableBrain;
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

    public function weighter()
    {
        $w = TimeTableBrainPSRed::weighter ();
        return $w;
    }

    /** PRESERVED FOR ROUTE IN WEB */

//    /** AUTOMATED TIMETABLE MANAGEMENT SYSTEMS */
//    public function automata(Request $request)
//    {
//        return (function($q){
//            if($q === "non_modular"){
//                return TimeTableBrainPSRed::automata_nonmodular ();
//            }else if($q === "modular"){
//                return TimeTableBrainPSRed::automata_modular ();
//            }
//        })($request->action);
//    }
//    /** AUTOMATED TIMETABLE MANAGEMENT SYSTEMS */

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
        $cLB = TimeTableBrain::countLectBurden ();
        return $cLB;
    }

    public function experimental(Request $request)
    {
        // $c = TimeTableBrain::timeslot ();
        //$c = TimeTableBrain::teacherTimeGenerate ();
        $c = TimeTableBrain::showSubjectWithID ( $request->id );
        //$c = TimeTableBrain::serializeBurden ();
        return $c;
    }

    public function experimental2()
    {
        // $c = TimeTableBrain::timeslot ();
        //$c = TimeTableBrain::teacherTimeGenerate ();
        $c = TimeTableBrain::showSubject ();
        //$c = TimeTableBrain::serializeBurden ();
        return $c;
    }
}
