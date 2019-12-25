<?php

namespace App\Http\Controllers\RESTController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Constraint;
use Illuminate\Support\Facades\Session;

class TeacherBurdenREST extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax ()) {
            $id = Session::get ( 'teacher_id' );
            $data = Constraint::where ( "teacher_id" , $id )->get ();
            return DataTables::of ( $data )
                ->make ( true );
        }
        return view ( 'management.teacherburden.teacherburdenlist' )->with ( 'title' , 'ภาระงานอาจารย์' );
    }
}
