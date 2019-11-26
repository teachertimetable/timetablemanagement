<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class TeacherBurdenController extends Controller
{
    public function index(){
        return view('management.teacherburden.index')->with('title','ภาระงานของอาจารย์');
    }
}
