@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <h2 style="text-align:center">อาจารย์ประจำสาขา</h2>
            <table class="table table-bordered" id="lecturerView">
                <thead>
                    <tr>
                        <th>รหัสอาจารย์</th>
                        <th>ชื่อ</th>
                        <th>อีเมลล์</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>รูปภาพอาจารย์</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
        <br>
    </div>
@endsection
