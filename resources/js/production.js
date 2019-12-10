const Swal = require('sweetalert2');
const moment = require('moment');
require('datatables.net-bs4');

$(function() {
    $(document).ready(function () {
        /* DATATABLES (/management/lecturerlist) (/management/subjectlist)*/
        $('#lecturerView').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/management/lecturerlist",
            },
            columns: [
                {
                    data: "teacher_id",
                    name: "teacher_id"
                },
                {
                    data: "teacher_name",
                    name: "teacher_name"
                },
                {
                    data: "teacher_email",
                    name: "teacher_email"
                },
                {
                    data: "teacher_tel",
                    name: "teacher_tel"
                },
                {
                    data: function (img) {
                        return '<img width="100px" class="mx-auto d-block" src="' + img.teacher_pic_src + '"/>';
                    },
                    name: "teacher_pic_src"
                },
                {
                    data: function (tid){
                        return '<a class="btn btn-info" href="/management/lecturerlist/view/'+tid.teacher_id+'">ดูข้อมูลอาจารย์</a>';
                    },
                    name: "teacher_id"
                }
            ]
        });
        $('#subjectView').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/management/subjectlist",
            },
            columns: [
                {
                    data: "subject_id",
                    name: "subject_id"
                },
                {
                    data: "subject_name",
                    name: "subject_name"
                },
                {
                    data: function(d){
                        return d.credit.substring(0,1);
                    },
                    name: "credit"
                },
                {
                    data: function(d){
                        let subcredit = "";
                        let sumiresubcredit = d.credit.substring(2, 7);
                        if (sumiresubcredit === '') {
                            subcredit = "ไม่มีการเรียนการสอน";
                        } else {
                            subcredit = sumiresubcredit;
                        }
                        return subcredit;
                    },
                    name: "credit"
                }
            ]
        });
        $('#burdenView').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/management/teacherburden",
            },
            columns: [
                {
                    data: "constraints_title",
                    name: "constraints_title"
                },
                {
                    data: "weekday",
                    name: "weekday"
                },
                {
                    data: "start_time",
                    name: "start_time"
                },
                {
                    data: "end_time",
                    name: "end_time"
                }
            ]
        });
        /* DATATABLES (/management/lecturerlist) (/management/subjectlist) (/management/teacherburden)*/
        $('#logout').click(function () {
            Swal.fire({
                title: 'คำเตือน',
                text: "แน่ใจว่าคุณจะออกจากระบบ ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'สำเร็จ',
                        'คุณได้ออกจากระบบแล้ว',
                        'success'
                    );
                    $('#logout-form').submit();
                }
            })
        });
        $('#insert').click(function () {
            Swal.fire({
                icon: 'success',
                title: 'บันทึกสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            })
        });
    });
});
