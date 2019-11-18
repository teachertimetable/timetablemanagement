@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <h2 style="text-align:center">อาจารย์ประจำสาขา</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="lecturerView">
                <thead>
                    <tr>
                        <th>รหัสอาจารย์</th>
                        <th>ชื่อ</th>
                        <th>อีเมลล์</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
        <br>
    </div>
@endsection
