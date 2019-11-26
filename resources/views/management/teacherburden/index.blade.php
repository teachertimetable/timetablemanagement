@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <h2 style="text-align:center">ภาระงานของอาจารย์</h2>
            กรอกภาระการสอน
            <input type="text" class="form-control" placeholder="ภาระการสอน" name="constraint_title"><br>
            รหัสวิชา
            <input type="text" class="form-control" placeholder="รหัสวิชา" name="username"><br>
            ชื่อวิชา
            <input type="text" class="form-control" placeholder="ชื่อวิชา" name="username"><br>
            หน่วยกิต
            <select class="form-control" id="credit" name="sellist1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
            </select><br>

            <div class="row">
                <div class="col-md-6">
                    วันที่ไม่สะดวกสอน<br>
                    <select class="form-control" id="day" name="sellist1">
                        <option>จันทร์</option>
                        <option>อังคาร</option>
                        <option>พุธ</option>
                        <option>พฤหัสบดี</option>
                        <option>ศุกร์</option>
                        <option>เสาร์</option>
                        <option>อาทิตย์</option>
                    </select>
                </div><br>
                <div class="col-md-6">
                    ช่วงเวลา<br>
                    <div>
                        <label class="form-check-label">
                            &emsp;<input type="radio" class="form-check-input" name="optradio">8:00-12:00
                            &emsp; &emsp;<input type="radio" class="form-check-input" name="optradio">13:00-16:00
                            &emsp; &emsp;<input type="radio" class="form-check-input" name="optradio">17:00-22:00
                        </label>
                    </div>
                </div>
            </div><br>
            <center><a href="#" class="btn btn-info btn-md" role="button"> บันทึก </a> &emsp;
                <a href="#" class="btn btn-success btn-md" role="button"> ยืนยัน </a></center>

        </div>
    </div>
@endsection
