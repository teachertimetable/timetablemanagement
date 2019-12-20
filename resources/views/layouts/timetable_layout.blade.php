<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @if(isset($title)) {{ $title }} @else Timetable Management System @endif</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body,
        html {
            font-family: 'Sarabun', sans-serif;
            font-size: 15px;
            scroll-behavior: smooth;

        }

        .parallax {
            /* The image used */
            /*background-image: url("https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80");

            /* Set a specific height */
            min-height: 500px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .loginbg {

            margin-top: 7%;
            margin-bottom: 7%;
            margin-left: 15%;
            margin-right: 15%;
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 5%;
            padding-bottom: 5%;
            background-color: white;
            box-shadow: 0px 11px 18px -16px rgba(0, 0, 0, 0.75);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img width="50px" src="{{asset('img/logo.jpg')}}"/><a class="navbar-brand" href="#">ระบบจัดตารางสอนสำหรับอาจารย์</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">ตารางสอน</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('normal.index') }}">แบบปกติ</a>
                            <a class="dropdown-item" href="{{ route('modular.index') }}">แบบโมดูล</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subjectlist.index') }}">รายวิชา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lecturerlist.index') }}">รายชื่ออาจารย์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacherburden.index') }}">เงื่อนไขของอาจารย์</a>
                    </li>
                </ul>
                <span class="navbar-text">
                        @guest
                        <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                    @else
                        <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false">สวัสดี คุณ {{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="editinfo">แก้ไขข้อมูลส่วนตัว</a>
                                    <a class="dropdown-item" id="logout">ออกจากระบบ</a>
                                </div>
                            </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                </span>
            </div>
        </nav>
        <main class="py-4 parallax">
            @yield('content')
        </main>
    </div>
</body>
