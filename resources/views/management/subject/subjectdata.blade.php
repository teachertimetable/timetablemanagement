@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            @foreach($Subject as $tb)
                <form method="POST" action="/management/subjectlist/poster">
                    @csrf
                    <h2 style="text-align:center">ข้อมูลรายวิชา</h2><br><br>
                    <div class="row">
                        <p>สำหรับการแก้ไขเท่านั้น</p>
                        <div class="col-md-2">
                            ชั้นปี :
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="year" min="1" max="4" class="form-control"
                                   value="{{ $tb->year }}"/>
                        </div>
                        <input type="hidden" name="subject_id"
                               value="{!! str_replace("\xA0", '', $tb->subject_id) !!}"/>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            รหัสวิชา :
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ $tb->subject_id }}" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                        ชื่อวิชา :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $tb->subject_name }}"disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        หน่วยกิต :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $tb->credit }}"disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        รหัสอาจารย์ :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $tb->teacher_id }}"disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        ชื่ออาจารย์ :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $tb->teacher_name }}" disabled>
                    </div>
                </div>
                    <br>
                    <input type="submit" name="submit" class="btn btn-info"/>
                </form>
            @endforeach

        </div>
        <br>
    </div>
@endsection
