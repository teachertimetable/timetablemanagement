@extends('layouts.timetable_layout')

@section('content')

    <div class="container">
        <div class="animated fadeIn jumbotron shadow bg-white">
            <h1 class="animated zoomIn">จัดตารางอัตโนมัติ</h1>
            <hr></hr>
            <center>
                <button class="animated bounceIn btn btn-success" id="generateTimetable"><i class="fa fa-calendar" aria-hidden="true"></i>
                    สร้างตาราง
                </button>
                <button class="animated bounceIn btn btn-success" id="generateTimeTablePerPerson"><i class="fa fa-clock-o"
                                                                                   aria-hidden="true"></i> ลงตาราง
                </button>
                <button class="animated bounceIn btn btn-danger" id="deleteTimeTablePerPerson"><i class="fa fa-trash" aria-hidden="true"></i> ลบตาราง
                </button>
            </center>
        </div>
    </div>
@endsection
