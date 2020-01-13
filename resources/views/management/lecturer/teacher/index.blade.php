@extends('layouts.timetable_layout')

@section('content')

    <div class="container">
        <div class="jumbotron shadow bg-white">
            <div class="container">
                <h2>ข้อมูลอาจารย์</h2>
                <hr></hr>
                <div class="row">
                    @foreach($userget as $u)
                        <div class="col-2 ">
                            <img src="{{ $u["teacher_pic_src"] }}" width="150px" class="img-thumbnail"/>
                        </div>
                        <div class="col-10 py-4 bg-light text-dark"><br>
                            <div class="row">
                                <div class="col-6"style="text-align: right">
                                    <h4>รหัสอาจารย์ &emsp;:</h4>
                                    <h4>ชื่อ &emsp;:</h4>
                                    <h4>อีเมลล์ &emsp;:</h4>
                                    <h4>ตำแหน่ง &emsp;:</h4>
                                    <h4>เบอร์โทร &emsp;:</h4>
                                    <h4>Fax &emsp;:</h4>
                                    <h4>หลักสูตร &emsp;:</h4>
                                </div>
                                <div class="col-6" style="text-align: left">
                                    <h4>{{ $u["teacher_id"] }}</h4>
                                    <h4>{{ $u["teacher_name"] }}</h4>
                                    <h4>{{ $u["teacher_email"] }}</h4>
                                    <h4>{{ $u["position"] }}</h4>
                                    <h4>{{ $u["teacher_tel"] }}</h4>
                                    <h4>{{ $u["teacher_tel_fax"] }}</h4>
                                    <h4>{{ $u["minor"] }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="jumbotron shadow">
            <div class="container">
                <h2>รายวิชาที่ท่านสอน</h2>
                <hr></hr>
                <div class="container">
                    <table class="table table-bordered" id="teachsubjectView">
                        <thead>
                        <tr>
                            <th>รหัสวิชา</th>
                            <th>ชื่อ</th>
                            <th>จำนวนหน่วยกิต</th>
                            <th>ชั่วโมงที่เรียน</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="jumbotron shadow bg-white">
            <div class="container">
                <h2>วิชาที่ท่านได้สอนจากการแนะนำของระบบตาราง</h2>
                <hr></hr>
                <div class="container" id="tblect">
                    <table class="table" id="tablelect">
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
