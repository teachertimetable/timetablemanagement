<?php

namespace App\Http\Controllers\RESTController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Constraint;

class TeacherBurdenREST extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax ()) {
            $data = Constraint::query ()->get ();
            return DataTables::of ( $data )
                ->make ( true );
        }
        return view ( 'management.teacherburden.teacherburdenlist' )->with ( 'title' , 'ภาระงานอาจารย์' );
    }
}
