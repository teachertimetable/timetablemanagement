<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherBurdenController extends Controller
{
    public function index(){
        return view('management.teacherburden.index')->with('title','ภาระงานของอาจารย์');
    }
}
