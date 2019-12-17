<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command ( 'inspire' , function () {
    $this->comment ( Inspiring::quote () );
} )->describe ( 'Display an inspiring quote' );

Artisan::command ( 'list_timetable' , function () {
    $this->comment ( \App\Models\Timetable::all () );
} )->describe ( 'Listing an TimeTable' );

Artisan::command ( 'constraint' , function () {
    $tb = new \App\Http\Controllers\TimeTableController();
    $this->comment ( print_r ( $tb->minimalShaping () ) );
} )->describe ( 'Listing an Constraints' );

Artisan::command ( 'flushconstraint' , function () {
    try {
        \App\Models\Constraint::truncate ();
        $this->comment ( 'Completed ! ' );
    } catch (\Illuminate\Database\Eloquent\RelationNotFoundException $e) {
        $this->comment ( 'Error Exception ! ' );
    }
} )->describe ( 'Truncating Constraints on TimeTable' );

Artisan::command ( 'viewteacher' , function () {
    $e = \App\Models\TeachBy::with ( ['haveTeacher' , 'haveSubjectName'] )->get ()->toArray ();
    $col = [];
    foreach ($e as $compilation) {
        $col[] = array(
            "subject_id" => $compilation[ 'have_subject_name' ][ 'subject_id' ] ,
            "subject_name" => $compilation[ 'have_subject_name' ][ 'subject_name' ] ,
            "teacher_id" => $compilation[ 'have_teacher' ][ 'teacher_id' ] ,
            "teacher_name" => $compilation[ 'have_teacher' ][ 'teacher_name' ]
        );
    }
    $this->table ( array("subject_id" , "subject_name" , "teacher_id" , "teacher_name") , $col );
} )->describe ( 'View Teacher' );
