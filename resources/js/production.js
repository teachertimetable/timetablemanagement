const Swal = require('sweetalert2');
require('datatables.net-bs4');

/* DATATABLES (/management/lecturerlist) (/management/subjectlist)*/
$(function() {
    $(document).ready(function () {
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
                    data: "teacher_pic_src",
                    name: "teacher_pic_src"
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
                        let sumiresubcredit = d.credit.substring(2,7);
                        if(sumiresubcredit === ''){
                            subcredit = "ไม่มีการเรียนการสอน";
                        }else{
                            subcredit = sumiresubcredit;
                        }
                        return subcredit;
                    },
                    name: "credit"
                }
            ]
        });
        $('#logout').click(function(){
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
    });
});
/* DATATABLES (/management/lecturerlist) (/management/subjectlist)*/