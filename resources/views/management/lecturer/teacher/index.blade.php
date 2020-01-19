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
                                    <h5>รหัสอาจารย์ &emsp;:</h5>
                                    <h5>ชื่อ &emsp;:</h5>
                                    <h5>อีเมลล์ &emsp;:</h5>
                                    <h5>ตำแหน่ง &emsp;:</h5>
                                    <h5>เบอร์โทร &emsp;:</h5>
                                    <h5>Fax &emsp;:</h5>
                                    <h5>หลักสูตร &emsp;:</h5>
                                </div>
                                <div class="col-6" style="text-align: left">
                                    <h5>{{ $u["teacher_id"] }}</h5>
                                    <h5>{{ $u["teacher_name"] }}</h5>
                                    <h5>{{ $u["teacher_email"] }}</h5>
                                    <h5>{{ $u["position"] }}</h5>
                                    <h5>{{ $u["teacher_tel"] }}</h5>
                                    <h5>{{ $u["teacher_tel_fax"] }}</h5>
                                    <h5>{{ $u["minor"] }}</h5>
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
