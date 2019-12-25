<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherInfo;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $e = Auth::user ()->email;
        if ($e) {
            $userget = TeacherInfo::where ( "teacher_email" , $e )->get ()->toArray ();
            Session::put ( "teacher_id" , $userget[ 0 ][ "teacher_id" ] );
        }
        return view ( 'welcomesite' );
    }
}
