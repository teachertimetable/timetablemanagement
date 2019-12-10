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

}
