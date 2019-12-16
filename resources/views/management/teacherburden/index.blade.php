@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <form class="form-group" method="POST" action="{{ route('saveTeacherBurden') }}">
                {{ @csrf_field () }}
                <h2 style="text-align:center">เงื่อนไขของอาจารย์</h2>
                กรอกเงื่อนไขการสอน
                <input type="text" class="form-control" placeholder="ภาระการสอน" name="constraint_title"><br>
                <div class="row">
                    <div class="col-md-6">
                        วันที่ไม่สะดวกสอน<br>
                        <select class="form-control" name="weekday" id="day" name="sellist1">
                            <option value="mon">จันทร์</option>
                            <option value="tue">อังคาร</option>
                            <option value="wed">พุธ</option>
                            <option value="thu">พฤหัสบดี</option>
                            <option value="fri">ศุกร์</option>
                            <option value="sat">เสาร์</option>
                            <option value="sun">อาทิตย์</option>
                        </select>
                    </div>
                    <br>
                    <div class="col-md-6">
                        ช่วงเวลา<br>
                        <div>
                            <label class="form-check-label">
                                &emsp;<input type="radio" class="form-check-input" name="time" value="09:00-12:00">
                                9:00-12:00 (ช่วงเช้า)
                                &emsp; &emsp;<input type="radio" class="form-check-input" name="time"
                                                    value="13:00-16:00">
                                13:00-16:00 (ช่วงกลางวัน)
                                &emsp; &emsp;<input type="radio" class="form-check-input" name="time"
                                                    value="17:00-20:00">
                                17:00-20:00 (ช่วงเย็น)
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <center><input type="submit" class="btn btn-primary btn-md" value="บันทึก" id="insert"/>
                    <a href="#" class="btn btn-danger btn-md" role="button"> ยืนยัน </a></center>
            </form>
        </div>
    </div>
@endsection
