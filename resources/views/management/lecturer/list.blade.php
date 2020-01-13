@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            @foreach($data as $teacher)
                <h2 style="text-align:center">ข้อมูลอาจารย์</h2> <hr></hr><br><br>
                <img width="200px" class="mx-auto d-block img-thumbnail" src="{{ $teacher->teacher_pic_src }}"/><br>
                <div class="row">
                    <div class="col-md-2">
                        รหัสอาจารย์ :
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="teacher_id" class="form-control" value="{{ $teacher->teacher_id }}"
                               disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        ชื่ออาจารย์ :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="{{ $teacher->teacher_name }}" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        อีเมลล์ :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="{{ $teacher->teacher_email }}" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        เบอร์โทรศัพท์ :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="{!! $teacher->teacher_tel !!}" disabled>
                    </div>
                </div><br>
            @endforeach


        </div>
        <div class="jumbotron shadow">
            <div class="container">
                <h2>ตารางสอน</h2>
                <hr></hr>
                <div id="timetable"></div>
            </div>
        </div>
        <br>
    </div>
@endsection
