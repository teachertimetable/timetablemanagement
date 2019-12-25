@extends('.layouts.timetable_layout')

@section('content')
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>



    <div class="container py-3">
        <div class="tablemodulebg">
            <center><h1>ตารางแนะนำแบบโมดูล</h1>

               <br>
                    <button class="button">นิเทศศาสตร์</button>
                    <button class="button">ซอฟต์แวร์วิสาหกิจ</button>
                    <button class="button">ธุรกิจอัฉริยะ</button>
                    <button class="button">สารสนเทศศึกษา</button>
                <br><br>


                <div class="col-lg-14">

                    <div class="card mt-8">
                        <img class="card-img-top img-fluid" src="http://placehold.it/900x500" alt="">
                    </div>
                </div>

                <br><br><br>

                <div>
                    <button class="button"><i class="fa fa-download"></i> Download PDF </button>
                </div>


    </div>
@endsection


