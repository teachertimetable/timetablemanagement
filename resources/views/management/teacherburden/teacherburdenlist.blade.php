@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        @guest
            <div class="jumbotron">
                <h1 class="display-4">กรุณาเข้าสู่ระบบก่อนทำรายการทั้งหมด</h1>
            </div>
        @else
            <div class="animated fadeIn able-responsive jumbotron shadow">
                <h2 class="animated zoomIn" style="text-align:center">รายการเงื่อนไขการสอน</h2>
                <a href="{{ route('teacherBurdenAdd') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มเงื่อนไขการสอน</a><br>
                <table class="table table-bordered" id="burdenView">
                    <thead>
                    <tr>
                        <th>เงื่อนไขการสอน</th>
                        <th>วันที่ไม่สะดวก</th>
                        <th>ช่วงเวลาเริ่ม</th>
                        <th>ช่วงเวลาจบ</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
        <br>
        @endguest
    </div>

@endsection
