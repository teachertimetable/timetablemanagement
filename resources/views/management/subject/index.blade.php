@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <h2 style="text-align:center">รายวิชา</h2>
            <table class="table table-bordered" id="subjectView">
                <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อ</th>
                    <th>จำนวนหน่วยกิต</th>
                    <th>ชั่วโมงที่เรียน</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
        <br>
    </div>
@endsection
