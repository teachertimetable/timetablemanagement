@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="table-responsive jumbotron shadow">
            @foreach($teacher_info as $teacher)
            <h2 style="text-align:center">ข้อมูลอาจารย์</h2><br><br>
            <img width="200px" class="mx-auto d-block img-thumbnail" src="{{ $teacher->teacher_pic_src }}"/><br>
            <div class="row">
              <div class="col-md-2">
                  รหัสอาจารย์ :
              </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ $teacher->teacher_id }}" disabled>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2">
                    ชื่ออาจารย์ :
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="{{ $teacher->teacher_name }}"disabled>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2">
                    อีเมลล์ :
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="{{ $teacher->teacher_email }}"disabled>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2">
                    เบอร์โทรศัพท์ :
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="{!! $teacher->teacher_tel !!}"disabled>
                </div>
            </div><br>
            @endforeach
            <table width="990" border="0" cellspacing="1" cellpadding="0"><tbody><tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td bgcolor="#ffffff"></td></tr>
                <tr bgcolor="#515151">
                    <td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b>&nbsp;<br><font face="MS Sans Serif" size="2">Day/Time</font><br>&nbsp;</b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">9:00-10:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">10:00-11:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">11:00-12:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">12:00-13:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">13:00-14:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">14:00-15:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">15:00-16:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">16:00-17:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">17:00-18:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">18:00-19:00</font></b></font></td><td align="CENTER" nowrap="" colspan="4"><font color="#ffffff" face="Times New Roman, Arial, Helvetica"><b><font face="MS Sans Serif" size="2">19:00-20:00</font></b></font></td><td bgcolor="#ffffff"></td></tr>
                <tr bgcolor="#f0f0f0"><td align="CENTER" bgcolor="#a0a0a0" colspan="4"><font color="#ffffff" face="MS Sans Serif" size="1"><b>&nbsp;<br>จันทร์<br>&nbsp;</b></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="3">&nbsp;</td><td></td></tr>
                <tr bgcolor="#f0f0f0">
                    <td align="CENTER" bgcolor="#a0a0a0" colspan="4"><font color="#ffffff" face="MS Sans Serif" size="1"><b>อังคาร</b></font></td><td align="CENTER" bgcolor="#c0d0ff" colspan="12"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="PROJECT IN ENTERPRISE SOFTWARE" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003185&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">204427</font></a></b><font face="tahoma"><font color="#000000"><br>(4) 1, B1206<br>B</font></font></font></td><td align="CENTER" bgcolor="#c0d0ff" colspan="4"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="COMPUTER PROGRAMMING I" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003564&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">523101</font></a></b><font face="tahoma"><font color="#000000"><br>(2) 5, B4101<br>B</font></font></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td bgcolor="#ffffff"></td></tr>
                <tr bgcolor="#f0f0f0">
                    <td align="CENTER" bgcolor="#a0a0a0" colspan="4"><font color="#ffffff" face="MS Sans Serif" size="1"><b>พุธ</b></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td align="CENTER" bgcolor="#c0d0ff" colspan="8"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="PLURI-CULTURAL THAI STUDIES" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003168&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">202324</font></a></b><font face="tahoma"><font color="#000000"><br>(2) 1, B4101<br>B</font></font></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td align="CENTER" bgcolor="#c0d0ff" colspan="12"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="COMPUTER PROGRAMMING I" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003564&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">523101</font></a></b><font face="tahoma"><font color="#000000"><br>(2) 5, Lab_Com5<br>B2</font></font></font></td><td bgcolor="#ffffff"></td></tr>
                <tr bgcolor="#f0f0f0">
                    <td align="CENTER" bgcolor="#a0a0a0" colspan="4"><font color="#ffffff" face="MS Sans Serif" size="1"><b>พฤหัสบดี</b></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td align="CENTER" bgcolor="#c0d0ff" colspan="8"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="SEMINAR IN ENTERPRISE SOFTWARE" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003184&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">204426</font></a></b><font face="tahoma"><font color="#000000"><br>(2) 2, B1132<br>B</font></font></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td bgcolor="#ffffff"></td></tr>
                <tr bgcolor="#f0f0f0"><td align="CENTER" bgcolor="#a0a0a0" colspan="4"><font color="#ffffff" face="MS Sans Serif" size="1"><b>&nbsp;<br>ศุกร์<br>&nbsp;</b></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="3">&nbsp;</td><td></td></tr>
                <tr bgcolor="#f0f0f0">
                    <td align="CENTER" bgcolor="#c05050" colspan="4"><font color="#ffffff" face="MS Sans Serif" size="1"><b>เสาร์</b></font></td><td align="CENTER" bgcolor="#c0d0ff" colspan="12"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="PROJECT IN ENTERPRISE SOFTWARE" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003185&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">204427</font></a></b><font face="tahoma"><font color="#000000"><br>(4) 1, B1206<br>B</font></font></font></td><td colspan="4">&nbsp;</td><td align="CENTER" bgcolor="#c0d0ff" colspan="8"><font color="#707070" face="Tahoma, Arial, Helvetica" size="2"><b>&nbsp;<a title="PROJECT IN ENTERPRISE SOFTWARE" href="class_info_2.asp?backto=learn_time&amp;option=1&amp;courseid=1003185&amp;normalURL=f%5Fcmd%3D2%26studentid%3D15970216%26studentname%3D%25B9%25D2%25C2%2B%25A4%25D8%25B3%25D2%25B9%25B9%25B5%25EC%2B%25E0%25C3%25D5%25C2%25B9%25AA%25CD%25BA%26acadyear%3D2562%26maxsemester%3D2%26rnd%3D43800%2E6769212963%26firstday%3D24%2F11%2F2562%26semester%3D2&amp;acadyear=2562&amp;semester=2"><font face="tahoma">204427</font></a></b><font face="tahoma"><font color="#000000"><br>(4) 1, B1206<br>B</font></font></font></td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td colspan="4">&nbsp;</td><td bgcolor="#ffffff"></td></tr>
                </tbody></table>
        </div>
        <br>
    </div>
@endsection
