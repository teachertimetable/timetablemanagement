@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="jumbotron">
            <center><h1>ตารางแนะนำ</h1><br>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        รายชื่ออาจารย์
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="#" id="teacher" value="all">All</a></li>
                        @foreach($teacher as $t)
                            <li class="dropdown-item">
                                <a href="#" id="teacher" value="{{ $t->teacher_id }}">{{ $t->teacher_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <br>
                <div class="col-lg-14">
                    <div class="card mt-8">
                        <img class="card-img-top img-fluid" src="http://placehold.it/900x500" alt="">
                    </div>
                    <br>
                    <a href="#" class="previous">&laquo; Previous</a>
                    <a href="#" class="next">Next &raquo;</a>
                </div>

@endsection


