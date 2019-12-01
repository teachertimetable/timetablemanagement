@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <h2 style="text-align:center">รายชื่อภาระงาน</h2>
            <a href="/management/teacherburden/add" class="btn btn-success">เพิ่มภาระงาน</a><br>
            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th>ภาระการสอน</th>
                    <th>วันที่ไม่สะดวก</th>
                    <th>ช่วงเวลา</th>
                </tr>
                </thead>
            </table>
        </div>
        <br>
    </div>
@endsection
