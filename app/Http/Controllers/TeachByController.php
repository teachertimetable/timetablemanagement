<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\TeacherInfo;
use App\Models\TeachBy;
use App\Models\Constraint;

class TeachByController extends Controller
{
    public function index()
    {
        $teach = Constraint::with ( 'have' )->get ();
        return view ( 'test' )->with ( 'teachr' , $teach );
    }
    public function viewWhoTeach2(Request $request)
    {
        $id = $request->subject_id;
        $data = TeachBy::where('subject_id',$id)->get();
        return view('management.subject.subjectdata')->with('teach_by',$data);
    }
    public function viewWhoTeach(Request $request)
    {
        $e = \App\Models\TeachBy::with ( ['haveTeacher' , 'haveSubjectName'] )->where ( "subject_id" , $request->subject_id )->get ()->toArray ();
        $col = [];
        foreach ($e as $compilation) {
            $col[] = array(
                "subject_id" => $compilation[ 'have_subject_name' ][ 'subject_id' ] ,
                "subject_name" => $compilation[ 'have_subject_name' ][ 'subject_name' ] ,
                "teacher_id" => $compilation[ 'have_teacher' ][ 'teacher_id' ] ,
                "teacher_name" => $compilation[ 'have_teacher' ][ 'teacher_name' ]
            );
        }
        return response ( $col );
    }
}
