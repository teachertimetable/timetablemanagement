<?php

namespace App\Http\Controllers\RESTController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Constraint;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TeacherBurdenREST extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax ()) {
            $id = Session::get ( 'teacher_id' );
            $priv = Auth::user ()->privileges;
            if ($id && $priv === 2) {
                $data = Constraint::where ( "teacher_id" , $id )->get ();
            } else if (!isset( $id ) && $priv === 1) {
                $data = Constraint::query ()->get ();
            }
            return DataTables::of ( $data )
                ->make ( true );
        }
        return view ( 'management.teacherburden.teacherburdenlist' )->with ( 'title' , 'ภาระงานอาจารย์' );
    }

    public function show(Request $request)
    {
        $constraint = Constraint::where ( "teacher_id" , $request->teacherburden )->get ()->toArray ();
        $packFullCal = [];
        foreach ($constraint as $c) {
            array_push ( $packFullCal , array("title" => $c[ "constraints_title" ] , "weekday" => $c[ "weekday" ] , "start" => $c[ "start_time" ] , "end" => $c[ "end_time" ]) );
        }
        return response ( $packFullCal );
    }
}
