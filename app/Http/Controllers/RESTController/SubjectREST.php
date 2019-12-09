<?php

namespace App\Http\Controllers\RESTController;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SubjectREST extends Controller
{
    public function index(Request $request){
        if($request->ajax()) {
            $data = Subject::query ()->get ();
            return DataTables::of ( $data )
                ->make ( true );
        }
        return view('management.subject.index')->with('title','รายชื่อวิชา');
    }
}
