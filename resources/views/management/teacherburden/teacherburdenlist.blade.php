@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <h2 style="text-align:center">รายชื่อภาระงาน</h2>
            <a href="{{ route('teacherBurdenAdd') }}" class="btn btn-success">เพิ่มภาระงาน</a><br>
            <table class="table table-bordered" id="burdenView">
                <thead>
                <tr>
                    <th>ภาระการสอน</th>
                    <th>วันที่ไม่สะดวก</th>
                    <th>ช่วงเวลาเริ่ม</th>
                    <th>ช่วงเวลาจบ</th>
                </tr>
                </thead>
            </table>
        </div>
        <br>
    </div>
@endsection
