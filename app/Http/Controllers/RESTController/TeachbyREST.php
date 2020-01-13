<?php

namespace App\Http\Controllers\RESTController;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\TeachBy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class TeachbyREST extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax ()) {
            if (Auth::check ()) {
                $data = (function () {
                    $p = [];
                    $r = TeachBy::with ( 'haveSubjectName' )->where ( 'teacher_id' , Session::get ( "teacher_id" ) )->get ()->toArray ();
                    foreach ($r as $rx) {
                        if (array_key_exists ( 'have_subject_name' , $rx )) {
                            array_push ( $p , $rx[ "have_subject_name" ] );
                        } else {

                        }
                    }
                    return $p;
                })();

            } else {
                $data = Subject::query ()->get ();
            }

            return DataTables::of ( $data )
                ->make ( true );
        }
        return view ( 'management.subject.index' )->with ( 'title' , 'รายชื่อวิชา' );
    }
}
