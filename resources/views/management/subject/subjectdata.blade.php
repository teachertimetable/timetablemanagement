@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            @foreach($Subject as $sub)
                <h2 style="text-align:center">ข้อมูลรายวิชา</h2><br><br>

                <div class="row">
                    <div class="col-md-2">
                        รหัสวิชา :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $sub->subject_id }}" disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        ชื่อวิชา :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $sub->subject_name }}"disabled>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        หน่วยกิต :
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $sub->credit }}"disabled>
                    </div>
                </div><br>

            @endforeach

        </div>
        <br>
    </div>
@endsection
