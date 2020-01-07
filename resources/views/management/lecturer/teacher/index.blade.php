@extends('layouts.timetable_layout')

@section('content')
    <div class="container">
        <div class="jumbotron shadow">
            <div class="container">
                <h2>ข้อมูลอาจารย์</h2>
                <div class="row" style="text-align: center">
                    @foreach($userget as $u)
                        <div class="col-2">
                            <img src="{{ $u["teacher_pic_src"] }}" width="150px"/>
                        </div>
                        <div class="col-10 py-4">
                            <h4>ชื่อ {{ $u["teacher_name"] }}</h4>
                            <h4>อีเมลล์ {{ $u["teacher_email"] }}</h4>
                            <h4>ตำแหน่ง {{ $u["position"] }}</h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="jumbotron shadow">
            <div class="container">
                <h2>วิชาที่ท่านได้สอนจากการแนะนำของระบบตาราง</h2>
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
