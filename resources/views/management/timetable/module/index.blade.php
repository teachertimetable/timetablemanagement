@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="jumbotron">
            <center><h1>ตารางแนะนำแบบโมดูล</h1>
                <br>
                <button class="btn btn-primary">นิเทศศาสตร์</button>
                <button class="btn btn-primary">ซอฟต์แวร์วิสาหกิจ</button>
                <button class="btn btn-primary">ธุรกิจอัฉริยะ</button>
                <button class="btn btn-primary">สารสนเทศศึกษา</button>
                <br><br>
                <div class="col-lg-14">

                    <div class="card mt-8">
                        <table border="1" bordercolor="lightgray">
                            <tr>
                                <td bgcolor="#515151"><font color="#FFFFFF">Day/Time</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">9.00-10.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">10.00-11.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">11.00-12.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">12.00-13.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">13.00-14.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">14.00-15.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">15.00-16.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">16.00-17.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">17.00-18.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">18.00-19.00</font></td>
                                <td bgcolor="#515151"><font color="#FFFFFF">19.00-20.00</font></td>
                            </tr>
                            <tr id="mon">
                                <td bgcolor="#A0A0A0"><font color="#FFFFFF">จันทร์</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                            <tr id="tue">
                                <td bgcolor="#A0A0A0"><font color="#FFFFFF">อังคาร</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                            <tr id="wed">
                                <td bgcolor="#A0A0A0"><font color="#FFFFFF">พุธ</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                            <tr id="thu">
                                <td bgcolor="#A0A0A0"><font color="#FFFFFF">พฤหัส</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                            <tr id="fri">
                                <td bgcolor="#A0A0A0"><font color="#FFFFFF">ศุกร์</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                            <tr id="sat">
                                <td bgcolor="#C05050"><font color="#FFFFFF">เสาร์</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                            <tr id="sun">
                                <td bgcolor="#C05050"><font color="#FFFFFF">อาทิตย์</font></td>
                                <td id="9am"></td>
                                <td id="10am"></td>
                                <td id="11am"></td>
                                <td id="12am"></td>
                                <td id="1pm"></td>
                                <td id="2pm"></td>
                                <td id="3pm"></td>
                                <td id="4pm"></td>
                                <td id="5pm"></td>
                                <td id="6pm"></td>
                                <td id="7pm"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br><br><br>
                <div>
                    <button class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</button>
                </div>
        </div>
@endsection

