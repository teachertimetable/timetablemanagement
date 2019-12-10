<?php

namespace App\Http\Controllers;

use App\Models\TeacherInfo;
use Illuminate\Http\Request;
use App\Models\Constraint;
use DateTime;

class TeacherBurdenController extends Controller
{
    public function index(){
        return view ( 'management.teacherburden.index' )->with ( 'title' , 'ภาระงานของอาจารย์' );
    }

    public function saveBurden(Request $request)
    {
        $r = explode ( "-" , $request->time );
        $st = new DateTime( $r[ 0 ] );
        $ed = new DateTime( $r[ 1 ] );
        $duration = "1";
        $teacher = TeacherInfo::orderBy ( 'teacher_name' )->get ( 'teacher_id' )->toArray ();
        $randomkey = array_rand ( $teacher , 1 );
        $con = Constraint::create ( [
            "constraints_title" => $request->constraint_title ,
            "teacher_id" => $teacher[ $randomkey ][ "teacher_id" ] ,
            "weekday" => $request->weekday ,
            "start_time" => $st ,
            "end_time" => $ed
        ] );
        return redirect ( route ( 'teacherburden.index' ) );
    }
}
