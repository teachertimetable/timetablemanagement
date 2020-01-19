@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="jumbotron">
            <center><h1>ตารางแนะนำแบบโมดูล</h1>
                <br>
                <button class="btn btn-primary" id="dc" onclick="modular('CTG010')">นิเทศศาสตร์</button>
                <button class="btn btn-primary" id="es" onclick="modular('CTG011')">ซอฟต์แวร์วิสาหกิจ</button>
                <button class="btn btn-primary" id="bida" onclick="modular('CTG013')">ธุรกิจอัฉริยะ</button>
                <button class="btn btn-primary" id="is" onclick="modular('CTG014')">สารสนเทศศึกษา</button>
                <br><br>

                <br><br><br>
                <div id="timetableModular"></div>
                <div>
                    <button class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</button>
                </div>
        </div>
@endsection

