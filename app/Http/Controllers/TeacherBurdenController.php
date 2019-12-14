<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constraint;

class TeacherBurdenController extends Controller
{
    public function index(){
        return view ( 'management.teacherburden.index' )->with ( 'title' , 'ภาระงานของอาจารย์' );
    }

    public function saveBurden(Request $request)
    {
        $r = explode ( "-" , $request->time );
        $st = $r[ 0 ];
        $ed = $r[ 1 ];
        $con = Constraint::create ( [
            "constraints_title" => $request->constraint_title ,
            "teacher_id" => '160044' ,
            "weekday" => $request->weekday ,
            "start_time" => $st ,
            "end_time" => $ed
        ] );
        return redirect ( route ( 'teacherburden.index' ) );
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
