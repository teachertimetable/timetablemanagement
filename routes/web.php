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
Auth::routes ();
/* AUTHENTICATION ROUTER */

/* ¯\_(ツ)_/¯ */

/* TIMETABLE MANAGEMENT ROUTER */

/* GENERAL CONTROLLER */
Route::get ( '/management/editinfo' , 'UserInfoController@reach' );
Route::post ( '/management/editinfo' , 'UserInfoController@edit' );
/* GENERAL CONTROLLER */

/* ABOUT CONTROLLER */
Route::get ( '/management/about/aboutus' , 'AboutController@index' )->name ( 'aboutus' );
/* ABOUT CONTROLLER */

/* HOME CONTROLLER */
Route::get ( '/' , 'HomeController@index' );
/* HOME CONTROLLER */

/* TIMETABLE CONTROLLER */
Route::get ( '/management/timetable/normal' , 'TimeTableController@normalview' )->name ( 'normalview_tt' );
Route::get ( '/management/timetable/modular' , 'TimeTableController@modularview' )->name ( 'modularview_tt' );

/* TIMETABLE CONTROLLER */

/* SUBJECT CONTROLLER */
Route::get ( '/management/subjectlist' , 'SubjectController@index' )->name ( 'subject' );
Route::resource ( '/management/subjectlist' , 'RESTController\SubjectREST' );
Route::post ( '/management/teachby/view' , 'TeachByController@viewWhoTeach' );
Route::get ( '/management/subjectlist/view/{id}' , 'SubjectController@list' );
Route::post ( '/management/subjectlist/poster' , 'SubjectController@edit' );
Route::resource ( '/management/teachbylist' , 'RESTController\TeachbyREST' );
/* SUBJECT CONTROLLER */

/* LECTURER CONTROLLER */
Route::resource ( '/management/lecturerlist' , 'RESTController\LecturerREST' );
Route::resource ( '/management/lecturerlist/teachby' , 'RESTController\LecturerREST@teachby' );
Route::get ( '/management/lecturerlist/view/{id}' , 'LecturerController@list' );
/* LECTURER CONTROLLER */

/* TeacherBurden CONTROLLER */
Route::resource ( '/management/teacherburden' , 'RESTController\TeacherBurdenREST' );
Route::get ( '/management/teacherburden/action/addBurden' , 'TeacherBurdenController@index' )->name ( 'teacherBurdenAdd' );
Route::post ( '/management/teacherburden/action/addBurden' , 'TeacherBurdenController@saveBurden' )->name ( 'saveTeacherBurden' );
Route::post ( '/management/teacherburden/action/deleteBurden' , 'TeacherBurdenController@deleteBurden' )->name ( 'deleteTeacherBurden' );
/* TeacherBurden CONTROLLER */

/* Teacher Controller */
Route::get ( '/management/teacher/index' , 'TeacherController@index' )->name ( 'teacherctrl' );
Route::get ( '/management/teacher/api' , 'TeacherController@apiView' );
/* Teacher Controller */

/* TIMETABLE MANAGEMENT ROUTER */

/* DANGEROUS FIELD */
Route::get ( '/management/countlectburden' , 'TimeTableController@countLectBurden' );
Route::get ( '/management/admin/generatetimeslot' , 'TimeTableController@generateTimeslot' );
Route::get ( '/management/admin/generateTimeTablePerPerson' , 'TimeTableController@generateTimeTablePerPerson' );
Route::get ( '/management/timetable/view/{teacher_id}' , 'TimeTableController@viewTimeTableTeacherID' );
Route::get ( '/management/timetable/view' , 'TimeTableController@viewAllTeacher' );
Route::get ( '/management/timetable/view/modular/{ctg}' , 'TimeTableController@viewModularCTG' );
Route::get ( '/management/admin/admincontrol' , 'AdminController@index' )->name ( 'Admincontrol' );
Route::get ( '/management/ttb' , 'TimeTableController@ex' );
/* DANGEROUS FIELD */
/* ¯\_(ツ)_/¯ */
