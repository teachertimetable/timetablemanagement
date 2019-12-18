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
                        return '<a class="btn btn-primary" href="/management/lecturerlist/view/'+tid.teacher_id+'">ดูข้อมูลอาจารย์</a>';
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
                },
                {
                    data: function (tid) {
                        return '<button class="btn btn-primary" id="viewsubject" aria-value="'+tid.subject_id+'">ข้อมูลรายวิชา</button>';
                    },
                    name: "subject_id"
                }
            ]
        });
        $('#subjectView tbody').on('click', 'button', function (e) {
            console.log(e.target);
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
                },
                {
                    data: function (tid) {
                        return '<button class="btn btn-danger" id="deleteBurden" aria-value="' + tid.id + '">ลบ</button>';
                    },
                    name: "id"
                }
            ]
        });

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        $('#subjectView tbody').on('click', 'button', function (e) {
            if (e.target.attributes[1].value === "viewsubject") {
                // console.log(e.target.attributes[2].value);
                swalWithBootstrapButtons.fire({
                    title: 'ข้อมูลรายวิชา',
                    text: "...",

                })
                $.ajax({
                    type: "POST",
                    url: "/management/teachby/view/",
                    data: {
                        subject_id: e.target.attributes[2].value
                    },
                    success: function(result) {
                        var content = '';
                        $.each(result, function(i, item){ // loop..
                            content = content + "รหัสอาจารย์ = " + item.teacher_id +  ', ชื่ออาจารย์ = ' + item.teacher_name + ', รหัสวิชา = ' + item.subject_id + ', ชื่อวิชา = ' + item.subject_name + ' <br>';
                        }); // ..loop

                        $('#content').html(content);
                    }
                });
            } else {

            }
        });

        $('#burdenView tbody').on('click', 'button', function (e) {
            if (e.target.attributes[1].value === "deleteBurden") {
                // console.log(e.target.attributes[2].value);
                swalWithBootstrapButtons.fire({
                    title: 'แน่ใจว่าคุณจะลบสิ่งนี้ ?',
                    text: "การลบครั้งนี้ไม่สามารถย้อนกลับได้ กรุณาคิดก่อนการลบ!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "/management/teacherburden/action/deleteBurden",
                            type: "POST",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                id: e.target.attributes[2].value
                            },
                            success: function (result) {
                                if (result.status === "delete_completed") {
                                    swalWithBootstrapButtons.fire(
                                        'ลบสำเร็จ',
                                        '⚡',
                                        'success'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location.reload()
                                        }
                                    })
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        'ลบไม่สำเร็จ',
                                        '🚫',
                                        'error'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location.reload()
                                        }
                                    })
                                }
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'คุณได้ยกเลิกไปแล้ว',
                            '❌❌',
                            'error'
                        )
                    }
                })
            } else {

            }
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
