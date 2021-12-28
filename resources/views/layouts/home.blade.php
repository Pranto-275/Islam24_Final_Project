<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Islam24</title>
    @livewireStyles
    @livewireScripts
 
</head>
<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
                    <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                    <a class="log-out-btn text-dark p-1 pt-2 rounded"
                                            href="#"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                class="bx bx-power-off font-size-16 align-middle text-danger"></i>
                                            Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    <a href="{{ route('sign-in') }}" class="btn btn-warning" style="float:right;">Login</a>
        </div>
    </nav>
      <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <center>
                    {{$slot}}
                    </center>
                </div>
                <!-- container-fluid -->
            </div>
        </div>
      </div>
<script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
     
</body>

</html>
