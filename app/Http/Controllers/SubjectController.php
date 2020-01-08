<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function list(Request $request)
    {
        $id = $request->id;
        $data = Subject::where ( 'subject_id' , $id )->get ();
        return view ( 'management.subject.subjectdata' )->with ( 'Subject' , $data );
    }

    public function edit(Request $request)
    {
        $id = $request->input ( 'subject_id' );
        $data = Subject::find ( $id );
        $data->year = $request->input ( 'year' );
        if ($data->save ()) {
            return redirect ( '/management/subjectlist/' );
        }
    }
}
