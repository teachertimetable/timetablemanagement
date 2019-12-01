<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherInfo;

class LecturerController extends Controller
{
    public function index(){

    }

    public function list(Request $request){
        $id = $request->id;
        $data = TeacherInfo::where('teacher_id',$id)->get();
        return view('management.lecturer.list')->with('teacher_info',$data);
    }
}
