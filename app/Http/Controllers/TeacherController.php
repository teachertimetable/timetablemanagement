<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Brain\TimeTableBrainPSRed;
use App\Models\TeacherInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        if (Auth::check ()) {
            $userget = TeacherInfo::where ( "teacher_email" , Auth::user ()->email )->get ()->toArray ();
            $title = "ระบบอาจารย์";
            return view ( 'management.lecturer.teacher.index' , compact ( 'userget' , 'title' ) );
        } else {

        }
    }

    public function apiView()
    {
        $userget = TeacherInfo::where ( "teacher_email" , Auth::user ()->email )->get ()->toArray ();
        $title = "ระบบอาจารย์";
        $ttb = TimeTableBrainPSRed::automata_nonmodular ();
        foreach ($userget as $u) {
            $ttbr = (function () use (&$ttb , &$u) {
                $pq = [];
                foreach ($ttb[ $u[ "teacher_id" ] ] as $tt) {
                    array_push ( $pq , array("subject_id" => key ( $tt ) ,
                        "arr" => (function () use (&$tt) {
                            $i = 0;
                            $x = [];
                            foreach ($tt[ key ( $tt ) ] as $final) {
                                array_push ( $x , $final );
                            }
                            return $x;
                        })()) );
                }
                return $pq;
            })();
        }
        return response ( $ttbr );
    }
}
