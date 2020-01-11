@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="jumbotron">
            <center><h1>ตารางแนะนำ</h1><br>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        รายชื่ออาจารย์
                    </button>
                    <ul class="dropdown-menu" id="teacher">
                        <li class="dropdown-item"><a href="#" value="all">All</a></li>
                        @foreach($teacher as $t)
                            <li class="dropdown-item">
                                <a href="#" value="{{ $t->teacher_id }}"
                                   onclick="teacherTimeTable({{$t->teacher_id}})">{{ $t->teacher_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <br>
                <div id="timetableAll"></div>
                <br>
                <a href="#" class="previous">&laquo; Previous</a>
                <a href="#" class="next">Next &raquo;</a>
            </center>
        </div>
    </div>


@endsection

