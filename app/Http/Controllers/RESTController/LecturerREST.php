<?php

namespace App\Http\Controllers\RESTController;

use Illuminate\Http\Request;
use App\Models\TeacherInfo;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class LecturerREST extends Controller
{
    public function index(Request $request){
        if($request->ajax()) {
            $data = TeacherInfo::query ()->get ();
            return DataTables::of ( $data )
                ->make ( true );
        }
        return view('management.lecturer.index')->with('title','รายชื่ออาจารย์');
    }
}
