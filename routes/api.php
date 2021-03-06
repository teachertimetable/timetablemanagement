<?php

use App\Http\Controllers\Brain\TimeTableBrainPSRed;
use Illuminate\Http\Request;
use App\Models\TeacherInfo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware ( 'auth:api' )->get ( '/user' , function (Request $request) {
    return $request->user ();
} );

Route::get ( 'timetable_automate/{action}' , function (Request $q) {
    if ($q->action === "non_modular") {
        return TimeTableBrainPSRed::automata_nonmodular ();
    } else if ($q->action === "modular") {
        return TimeTableBrainPSRed::automata_modular ();
    }
} );

Route::post ( 'teacher_info' , function (Request $request) {
    $req = $request->json ()->all ();
    $p = TeacherInfo::where ( 'teacher_id' , $req[ 'teacher_id' ] )->get ();
    return $p;
} );
