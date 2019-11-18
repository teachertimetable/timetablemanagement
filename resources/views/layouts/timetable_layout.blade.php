<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ระบบจัดตารางสอนสำหรับอาจารย์</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ตารางสอน</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('timetable_normal') }}">แบบปกติ</a>
                            <a class="dropdown-item" href="{{ route('timetable_modular') }}">แบบโมดูล</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subjectlist.index') }}">รายวิชา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lecturerlist.index') }}">รายชื่ออาจารย์</a>
                    </li>
                </ul>
                <span class="navbar-text">
                        @guest
                            <div>เข้าสู่ระบบ</div>
                        @else
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">สวัสดี คุณ {{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="editinfo">แก้ไขข้อมูลส่วนตัว</a>
                                    <a class="dropdown-item" id="logout">ออกจากระบบ</a>
                                </div>
                            </div>
                        @endguest
                </span>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
