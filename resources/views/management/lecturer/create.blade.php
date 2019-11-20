@extends('layouts.timetable_layout')

@section('content')
    <div class="py-2 container jumbotron shadow">
        <form method="post" id="subject_add">
            {{ csrf_field() }}
            <center><h3>เพิ่มอาจารย์</h3> </center><br><br>
            <div class="row">
                <div class="col-md-2">
                    ชื่อ :<br>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="xxxxx" name="subject_id" id="subject_id"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    ชื่อวิชา :
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="สัมนา" name="subject_name" id="subject_name"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    หน่วนกิต :
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="credit" name="credit">
                        <option>1 หน่วย</option>
                        <option>2 หน่วย</option>
                        <option>3 หน่วย</option>
                        <option>4 หน่วย</option>
                        <option>5 หน่วย</option>
                        <option>6 หน่วย</option>
                        <option>7 หน่วย</option>
                        <option>8 หน่วย</option>
                    </select>  <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    จำนวนชั่วโมง :
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="hour" name="hour">
                        <option>1 ชั่วโมง</option>
                        <option>2 ชั่วโมง</option>
                        <option>3 ชั่วโมง</option>
                        <option>4 ชั่วโมง</option>
                        <option>5 ชั่วโมง</option>
                        <option>6 ชั่วโมง</option>
                        <option>7 ชั่วโมง</option>
                        <option>8 ชั่วโมง</option>
                    </select><br>
                </div>
            </div><br>
            <center><button class="btn btn-info btn-md" ><i class="fa fa-check" aria-hidden="true"></i> บันทึก </button> &emsp;
                <a href="#" class="btn btn-danger btn-md" role="button"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก </a></center>
        </form>
    </div><br>
@endsection
