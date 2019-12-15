<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function list(Request $request){
        $id = $request->id;
        $data = Subject::where('subject_id',$id)->get();
        return view('management.subject.subjectdata')->with('Subject',$data);
    }
}
