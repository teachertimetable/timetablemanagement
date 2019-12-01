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
    Route::get('/','HomeController@index');
    /* HOME CONTROLLER */

    /* TIMETABLE CONTROLLER */
    Route::get('/management/timetable','TimeTableController@index')->name('timetable');
    Route::get('/management/timetable/normal','TimeTableController@normal_view')->name('timetable_normal');
    Route::get('/management/timetable/modular','TimeTableController@modular_view')->name('timetable_modular');
    /* TIMETABLE CONTROLLER */

    /* SUBJECT CONTROLLER */
Route::get ( '/management/subjectlist' , 'SubjectController@index' )->name ( 'subject' );
Route::resource ( '/management/subjectlist' , 'RESTController\SubjectREST' );
/* SUBJECT CONTROLLER */

/* LECTURER CONTROLLER */
Route::resource ( '/management/lecturerlist' , 'RESTController\LecturerREST' );
Route::get ( '/management/lecturerlist/view/{id}' , 'LecturerController@list' );
/* LECTURER CONTROLLER */

/* TeacherBurden CONTROLLER */
Route::resource ( '/management/teacherburden' , 'RESTController\TeacherBurdenREST' );
Route::get ( '/management/teacherburden/action/addBurden' , 'TeacherBurdenController@index' )->name ( 'teacherBurdenAdd' );
Route::post ( '/management/teacherburden/action/addBurden' , 'TeacherBurdenController@saveBurden' )->name ( 'saveTeacherBurden' );
    /* TeacherBurden CONTROLLER */

/* TIMETABLE MANAGEMENT ROUTER */

/* ¯\_(ツ)_/¯ */
