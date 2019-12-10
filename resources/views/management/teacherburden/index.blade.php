@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            <form class="form-group" method="POST" action="{{ route('saveTeacherBurden') }}" id="burden">
                {{ @csrf_field () }}
                <h2 style="text-align:center">เงื่อนไขของอาจารย์</h2>
                กรอกเงื่อนไขการสอน
                <input type="text" class="form-control" placeholder="ภาระการสอน" name="constraint_title" required/><br>
                <div class="row">
                    <div class="col-md-6">
                        วันที่ไม่สะดวกสอน<br>
                        <select class="form-control" name="weekday" id="day" required>
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
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="time" id="time1" value="9:00-12:00"
                                   required/>
                            <label class="form-check-label" for="time1">9:00-12:00 (เช้า)</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="time" id="time2" value="13:00-16:00"
                                   required/>
                            <label class="form-check-label" for="time2">13:00-16:00 (กลางวัน)</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="time" id="time3" value="17:00-20:00"
                                   required/>
                            <label class="form-check-label" for="time3">17:00-20:00 (เย็น)</label>
                        </div>
                    </div>
                </div>
                <br>
                <div style="text-align:center">
                    <input type="submit" class="btn btn-info btn-md" value="บันทึก"/>
                    <button class="btn btn-danger" onclick="document.getElementById('burden').reset()">ล้าง</button>
                </div>
            </form>
        </div>
    </div>
@endsection
