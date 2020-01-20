@extends('layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="loginbg animated zoomIn" style="text-align:center">
            <h1 class="animated zoomIn">ยินดีต้อนรับ</h1><br>
            <h2 class="animated zoomIn">คุณ {{ Auth::user()->name }} {{ Auth::user()->surname }}</h2><br>
            <h2 class="animated zoomIn">เข้าสู่ระบบจัดตารางสอนสำหรับอาจารย์</h2>
        </div>
    </div>
@endsection
