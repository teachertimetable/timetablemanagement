@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="jumbotron">
            <center><h1>ตารางแนะนำแบบโมดูล</h1>
                <br>
                <button class="btn btn-info">นิเทศศาสตร์</button>
                <button class="btn btn-info">ซอฟต์แวร์วิสาหกิจ</button>
                <button class="btn btn-info">ธุรกิจอัฉริยะ</button>
                <button class="btn btn-info">สารสนเทศศึกษา</button>
                <br><br>
                <div class="col-lg-14">

                    <div class="card mt-8">
                        <img class="card-img-top img-fluid" src="http://placehold.it/900x500" alt="">
                    </div>
                </div>
                <br><br><br>
                <div>
                    <button class="btn btn-info"><i class="fa fa-download"></i> Download PDF</button>
                </div>
        </div>
@endsection


