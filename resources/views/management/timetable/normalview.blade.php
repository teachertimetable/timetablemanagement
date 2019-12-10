@extends('layouts.timetable_layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-5 jumbotron shadow" id="ES">
                <h1>ES</h1>
                <table class="table bg-light" id="esTable">
                    <thead>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>เพิ่ม</th>
                    </thead>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>
            </div>
            <br><br>
            <div class="col-md-2">
            </div>
            <br><br>
            <div class="col-md-5 jumbotron shadow" id="BIDA">
                <h1>BIDA</h1>
                <table class="table bg-light" id="bidaTable">
                    <thead>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>เพิ่ม</th>
                    </thead>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-md-5 jumbotron shadow" id="IS">
                <h1>IS</h1>
                <table class="table bg-light" id="isTable">
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th></th>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>
            </div>
            <br><br>
            <div class="col-md-2">
            </div>
            <br><br>
            <div class="col-md-5 jumbotron shadow" id="DC">
                <h1>DC</h1>
                <table class="table bg-light" id="dcTable">
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th></th>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-md-5 jumbotron shadow" id="GE">
                <h1>GE</h1>
                <table class="table bg-light" id="geTable">
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th></th>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>
            </div>
            <br><br>
            <div class="col-md-2">
            </div>
            <br><br>
            <div class="col-md-5 jumbotron shadow" id="ENG">
                <h1>ENG</h1>
                <table class="table bg-light" id="engTable">
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th></th>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-md-5 jumbotron shadow" id="class2">
                <h1>2 หน่วย</h1>
                <table class="table bg-light" id="class2Table">
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th></th>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>

            </div>
            <br><br>
            <div class="col-md-2">
            </div>
            <br><br>
            <div class="col-md-5 jumbotron shadow" id="COOP">
                <h1>CO-OP</h1>
                <table class="table bg-light" id="coopTable">
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th></th>
                </table>
                <a data-target="#myModal" role="button" class="btn" data-toggle="modal">เพิ่ม</a>

            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <center>
                    <div class="modal-body">วัน :
                        <select>
                            <option>จันทร์</option>
                            <option>อังคาร</option>
                            <option>พุธ</option>
                            <option>พฤหัสบดี</option>
                            <option>ศุกร์</option>
                            <option>เสาร์</option>
                        </select>
                        &nbsp; &nbsp;จำนวนชั่วโมง :
                        <select>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>

                        </select>

                    </div>
                </center>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
