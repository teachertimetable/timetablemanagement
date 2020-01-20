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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href=" {{ asset('/assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img width="50px" src="{{asset('img/logo.jpg')}}"/><a class="navbar-brand"
                                                              href="/">ระบบจัดตารางสอนสำหรับอาจารย์</a>
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
                        <a class="dropdown-item" href="{{ route('normalview_tt') }}">แบบปกติ</a>
                        <a class="dropdown-item" href="{{ route('modularview_tt') }}">แบบโมดูล</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subjectlist.index') }}">รายวิชา</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lecturerlist.index') }}">รายชื่ออาจารย์</a>
                </li>
                <li class="nav-item">
                    @guest

                    @else
                        <a class="nav-link" href="{{ route('teacherburden.index') }}">เงื่อนไขของอาจารย์</a>
                    @endguest
                </li>
                <li class="nav-item">
                    @guest

                    @else
                        @if(Auth::user()->privileges === 2)
                            <a class="nav-link" href="{{ route('teacherctrl') }}">ข้อมูลเกี่ยวกับฉัน</a>
                        @elseif(Auth::user()->privileges === 1)
                            <a class="nav-link" href="{{ route('Admincontrol') }}">ควบคุมระบบ</a>
                        @endif
                    @endguest
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
                                    <a class="dropdown-item" href="{{ route('aboutus') }}">ผู้จัดทำ</a>
                                    <a class="dropdown-item" id="editInformation" data-user_id="{{ Auth::user()->id }}">แก้ไขข้อมูลส่วนตัว</a>
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
<!-- Footer -->
<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 IT Suranaree:
        <a href="http://soctech.sut.ac.th/it/webitsut2015/index.php">http://soctech.sut.ac.th</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

</body>
