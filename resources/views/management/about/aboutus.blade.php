@extends('.layouts.timetable_layout')
<style>
    .zoom {
        transition: transform .2s; /* Animation */
        margin: 0 auto;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
    .zoom:hover {
        transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
@section('content')
    <div class="container py-3">
            <div class="animated zoomIn table-responsive jumbotron shadow">
                <center><h1 class="animated zoomIn">ผู้จัดทำ</h1><br><br>
                <div class="row">
                    <div class="zoom animated fadeIn bg-white col-md-3" style="margin-left: 4%;margin-right: 4%">
                        <img src="{{URL::asset('/img/profile.jpg')}}" alt="profile Pic" height="200" width="200">
                        <h5>B5970216</h5> <h5>นายคุณานนต์ เรียนชอบ</h5>
                    </div>
                    <br>
                    <div class="zoom animated fadeIn bg-white col-md-3"style="margin-left: 4%;margin-right: 4%">
                        <img src="{{URL::asset('/img/profile.jpg')}}" alt="profile Pic" height="200" width="200">
                        <h5>B5970544</h5> <h5>นายอัศนันท์ อภิสิทธิ์วรโชติ</h5>
                    </div>
                    <br>
                    <div class="zoom animated fadeIn bg-white col-md-3"style="margin-left: 4%;margin-right: 4%">
                        <img src="{{URL::asset('/img/profile.jpg')}}" alt="profile Pic" height="200" width="200">
                        <h5>B5972364</h5> <h5>นายไพฑูรย์ เนติรังษีวัชรา</h5>
                    </div>
                </div>
                    <br>
                </center></div>
    </div>
@endsection
