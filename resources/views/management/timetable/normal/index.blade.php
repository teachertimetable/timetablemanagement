@extends('.layouts.timetable_layout')

@section('content')

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <div class="container py-3">
        <div class="tablemodulebg">
            <center><h1>ตารางแนะนำ</h1><br>

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">รายชื่ออาจารย์</button>
                            <ul class="dropdown-menu">
                                <li><a href="#">All</a></li>
                                <li><a href="#">อ.ดร.นิศาชล จำนงศรี</a></li>
                                <li><a href="#">รศ.ดร.วีรพงษ์ พลนิกรกิจ</a></li>
                                <li><a href="#">ผศ.ดร.หนึ่งหทัย ขอผลกลาง</a></li>
                                <li><a href="#">ผศ.ดร.ศุภกฤษฏิ์ นิวัฒนากูล</a></li>
                                <li><a href="#">อ.ดร.พรอนันต์ เอี่ยมขจรชัย</a></li>
                                <li><a href="#">ผศ.ดร.สถิตย์โชค โพธิ์สอาด</a></li>
                                <li><a href="#">อ.ดร.สรชัย กมลลิ้มสกุล</a></li>
                                <li><a href="#">อ.ดร.ธรรมศักดิ์ เธียรนิเวศน์</a></li>
                                <li><a href="#">ผศ.ดร.จิติมนต์ อั่งสกุล</a></li>
                                <li><a href="#">ผศ.ดร.ธรา อั่งสกุล</a></li>
                                <li><a href="#">อ.ดร.ฉัตรภัสร์ ฐิติอัคราวงศ์</a></li>
                                <li><a href="#">อ.ดร.พิชญสินี กิจวัฒนาถาวร</a></li>
                                <li><a href="#">อ.ดร.ธวัชพงษ์ พิทักษ์</a></li>
                                <li><a href="#">รศ.ดร.ศิรปัฐช์ บุญครอง</a></li>
                                <li><a href="#">อ.ดร.นพพล ตั้งสุภาชัย</a></li>
                            </ul>
                        </div>

                <br>
                <br>

                <div class="col-lg-14">

                    <div class="card mt-8">
                        <img class="card-img-top img-fluid" src="http://placehold.it/900x500" alt="">



                    </div>
                    <br>

                    <a href="#" class="previous">&laquo; Previous</a>
                    <a href="#" class="next">Next &raquo;</a>




        </div>

@endsection


