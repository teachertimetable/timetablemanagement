<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* AUTHENTICATION ROUTER */
Auth::routes();
/* AUTHENTICATION ROUTER */

/* ¯\_(ツ)_/¯ */

/* TIMETABLE MANAGEMENT ROUTER */

/* HOME CONTROLLER */
Route::get ( '/' , 'HomeController@index' );
/* HOME CONTROLLER */

/* TIMETABLE CONTROLLER */
Route::get ( '/management/timetable' , 'TimeTableController@index' )->name ( 'timetable' );
Route::get ( '/management/timetable/normal' , 'TimeTableController@normalview' )->name('normalview_tt');
Route::get ( '/management/timetable/modular' , 'TimeTableController@modularview' )->name('modularview_tt');

/* TIMETABLE CONTROLLER */

/* SUBJECT CONTROLLER */
Route::get ( '/management/subjectlist' , 'SubjectController@index' )->name ( 'subject' );
Route::resource ( '/management/subjectlist' , 'RESTController\SubjectREST' );
Route::post ( '/management/teachby/view' , 'TeachByController@viewWhoTeach' );
Route::get ( '/management/subjectlist/view/{id}' , 'SubjectController@list' );
/* SUBJECT CONTROLLER */

/* LECTURER CONTROLLER */
Route::resource ( '/management/lecturerlist' , 'RESTController\LecturerREST' );
Route::get ( '/management/lecturerlist/view/{id}' , 'LecturerController@list' );
/* LECTURER CONTROLLER */

/* TeacherBurden CONTROLLER */
Route::resource ( '/management/teacherburden' , 'RESTController\TeacherBurdenREST' );
Route::get ( '/management/teacherburden/action/addBurden' , 'TeacherBurdenController@index' )->name ( 'teacherBurdenAdd' );
Route::post ( '/management/teacherburden/action/addBurden' , 'TeacherBurdenController@saveBurden' )->name ( 'saveTeacherBurden' );
Route::post ( '/management/teacherburden/action/deleteBurden' , 'TeacherBurdenController@deleteBurden' )->name ( 'deleteTeacherBurden' );
/* TeacherBurden CONTROLLER */

/* TIMETABLE MANAGEMENT ROUTER */

/* DANGEROUS FIELD */
Route::get ( '/management/gettime' , 'TimeTableController@shaping' );
Route::get ( '/management/gettime/showM' , 'TimeTableController@minimalShaping' );
Route::get ( '/management/gettime/showM/{teacher_id}' , 'TimeTableController@minimalShapingWithID' );
Route::get ( '/management/gettime/showTimeAvail' , 'TimeTableController@weekdayUnDuplicator' );
Route::get ( '/management/gettime/showTimeWithLect' , 'TimeTableController@weekdaySearcher' );
Route::get ( '/management/countlectburden' , 'TimeTableController@countLectBurden' );
Route::get ( '/management/timetable_automate' , 'TimeTableController@automata' );
/* DANGEROUS FIELD */
/* ¯\_(ツ)_/¯ */
