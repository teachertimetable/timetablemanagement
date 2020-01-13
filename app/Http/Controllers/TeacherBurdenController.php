<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Constraint;
use App\Models\TeacherInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TeacherBurdenController extends Controller
{
    public function index()
    {
        if (Auth::check ()) {
            if (Auth::user ()->privileges === 1) {
                $teacher = TeacherInfo::query ()->get ();
                $title = "ภาระงานอาจารย์";
                return view ( 'management.teacherburden.index' )->with ( ['title' => $title , 'teacher' => $teacher] );
            } else {
                return view ( 'management.teacherburden.index' )->with ( 'title' , 'ภาระงานของอาจารย์' );
            }
        } else {
            return redirect ( '/' );
        }

    }

    private function randomLecturer()
    {
        $teacher = TeacherInfo::all ()->toArray ();
        $teacheridarray = [];
        foreach ($teacher as $tt) {
            $teacheridarray[] = $tt[ 'teacher_id' ];
        }
        $rnd = array_rand ( $teacheridarray , 1 );
        return $teacheridarray[ $rnd ];
    }

    public function saveBurden(Request $request)
    {
        $r = explode ( "-" , $request->time );
        $st = $r[ 0 ];
        $ed = $r[ 1 ];
        $id = Session::get ( 'teacher_id' );
        if (isset( $id )) {

        } else if (isset( $request->teacher_id ) && !isset( $id )) {
            $id = $request->teacher_id;
        }
        $teacherburdennotrepeat = Constraint::where('teacher_id',$id)
            ->where('weekday', $request->weekday)
            ->where('start_time',$st)
            ->where('end_time',$ed)
            ->get()->count();

        if($teacherburdennotrepeat >= 1){
            

        }else{
            $con = Constraint::create ( [
                "constraints_title" => $request->constraint_title ,
                "teacher_id" => $id ,
                "weekday" => $request->weekday ,
                "start_time" => $st ,
                "end_time" => $ed
            ] );
            return redirect ( route ( 'teacherburden.index' ) );
        }


    }

    public function deleteBurden(Request $request){
        $burden = Constraint::find($request->id);
        if ($burden) {
            $delete = Constraint::destroy ( $request->id );
            if ($delete === 1) {
                return response ( array("status" => "delete_completed") );
            } else {
                return response ( array("status" => "delete_uncompleted") );
            }
        } else {
            return response ( array("status" => "delete_uncompleted") );
        }
    }
}
