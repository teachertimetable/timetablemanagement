@extends('layouts.timetable_layout')

@section('content')

    <div class="parallax"><br>
        <div class="loginbg" data-aos="zoom-in" data-aos-duration="300">
            <form id="login" method="post">
                {{ csrf_token () }}
                <div class="row">
                    <div class="col-md-6" align="center">
                        <img src="img/profile.jpg" width="80%">
                    </div>

                    <div class="col-md-6">
                        <h2><b>LOGIN</b></h2><br>
                        Username
                        <input type="text" class="form-control" placeholder="user" name="username"><br>
                        Password
                        <input type="password" class="form-control" placeholder="xxxx" name="password"><br>

                        <input type="submit" class="btn btn-info" name="submit">
                        <br><a href="register.php">Create an account</a>
                    </div>
                </div>
            </form>
        </div><br>
    </div>
@endsection
