<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Brain\TimeTableBrain;
use App\Http\Controllers\Brain\TimeTableBrainPSRed;
use App\Models\TeacherInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function countLectBurden()
    {
        $cLB = TimeTableBrain::countLectBurden ();
        return $cLB;
    }

    public function experimental(Request $request)
    {
        $c = TimeTableBrain::showSubjectWithID_NonModular ( $request->id );
        return $c;
    }

    public function generateTimeslot(Request $request)
    {
        if ($request->ajax ()) {
            if (Auth::check ()) {
                if (Auth::user ()->privileges === 1) {
                    for ($i = 0; $i <= 100; $i++) {
                        TimeTableBrain::teacherTimeGenerate ();
                    }
                    return response ( array('status' => 'generate_completed') );
                } else {
                    return response ( array('status' => 'incompleted') );
                }
            } else {
                return response ( array('status' => 'unauthorized') );
            }
        }
    }

    public function viewTimeTableTeacherID(Request $request)
    {
        return TimeTableBrain::showTimeTable ( $request->teacher_id );
    }

    public function viewAllTeacher()
    {
        return TimeTableBrain::showAllTimeTable ();
    }

    public function viewModularCTG(Request $request)
    {
        return TimeTableBrain::showTimeTableModular ( $request->ctg );
    }

    public function ex()
    {
        return TimeTableBrain::teacherTimeGenerate ();
    }

    public function generateTimeTablePerPerson(Request $request)
    {
        if ($request->ajax ()) {
            if (Auth::check ()) {
                if (Auth::user ()->privileges === 1) {
                    $t = TeacherInfo::query ()->get ( 'teacher_id' );
                    foreach ($t as $teacher) {
                        TimeTableBrain::showSubjectWithID_NonModular ( $teacher[ "teacher_id" ] );
                        TimeTableBrain::showSubjectWithID_Module ( $teacher[ "teacher_id" ] );
                    }
                    return response ( array('status' => "generate_completed") );
                } else {
                    return response ( array('status' => 'incompleted') );
                }
            } else {
                return response ( array('status' => 'unauthorized') );
            }
        }
    }
}
