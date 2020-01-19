@extends('layouts.timetable_layout')

@section('content')

    <div class="container">
        <div class="jumbotron shadow bg-white">
            <h1>จัดตารางอัตโนมัติ</h1>
            <hr></hr>
            <center>
                <button class="btn btn-success" id="generateTimetable"><i class="fa fa-calendar" aria-hidden="true"></i>
                    สร้างตาราง
                </button>
                <button class="btn btn-success" id="generateTimeTablePerPerson"><i class="fa fa-clock-o"
                                                                                   aria-hidden="true"></i> ลงตาราง
                </button>
            </center>
        </div>
    </div>
@endsection
