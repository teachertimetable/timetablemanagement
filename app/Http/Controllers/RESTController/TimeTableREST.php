<?php

namespace App\Http\Controllers\RESTController;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TimeTableREST extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax ()) {
            $data = Subject::where ( 'category_id' , $request->get ( 'category_id' ) )->get ();
            return DataTables::of ( $data )
                ->make ( true );
        }
        return view ( 'management.timetable.normalview' )->with ( 'title' , 'รายวิชาตามตารางสอน' );
    }
}
