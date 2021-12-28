<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Islam24</title>
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @livewireStyles
    @livewireScripts
    <style>
        .container {
  margin: 0 auto;
  max-width: 1000px;
}
.navigation {
  width: 100%;
  height: 70px;
  padding: 15px 0;
  background-image: linear-gradient(-90deg, #fff, #eee);
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.3);
  webkittransition: all .8s; /* Safari prior 6.1 */
  transition: all .8s;

}
.logo {
  color: #888;
  width: 20%;
  float: left;
  line-height: 40px;
}
.navigation-links {
  text-align: right;
  padding: 0;
}
.navigation-links li {
  color: #888;
  display: inline-block;
  padding: 10px 20px;
  border-radius: 20px;
  -webkit-transition: all .8s; /* Safari prior 6.1 */
  transition: all .8s;
}

.navigation-links li.active {
  background-color: rgba(	83, 173, 203, .3);
}

.navigation-links li:hover {
  background-color: rgba(	83, 173, 203, 1);
  color: #fff;
  cursor: pointer;
}
.icon {
  display: none;
  padding: 20px;
  border-radius: 50%;
}

@media screen and (max-width: 600px) {
  .container {
    margin: 0 auto;
    max-width: 600px;
  }
  .logo {
    width: 100%;
    padding: 0 20px;
  }

  .navigation-links li {display: none;}
  .navigation-links a.icon {
    float: right;
    display: block;
    position: absolute;
    right: 20px;
    top: 40px;
  }
  .navigation.responsive .navigation-links a.icon {
    background-color: rgba(	83, 173, 203, 1);
    color: #fff;
    cursor: pointer;

  }

  .navigation.responsive {
    position: relative;
    height: 200px;
  }
  .navigation.responsive .navigation-links li {
    float: none;
    display: block;
    text-align: left;
      -webkit-transition: all .8s; /* Safari prior 6.1 */
  transition: all .8s;
  }
}

body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}
    </style>
</head>

<body>
      <div id="layout-wrapper">
        <!-- Start Nav Bar -->
        <nav class="navigation" id="navigation">
  <div class="">
    <div class="logo">
    &nbsp;&nbsp;<img src="{{ asset('logo.png') }}" style="height: 45px;background-color:green;" alt="Logo"/>
    </div>
    <ul class="navigation-links">
      <li><a href="{{ route('user1') }}">Home</a></li>
      <li><a href="{{ route('user_post') }}">Upload Post</a></li>
      <li><a href="{{ route('user_quiz_list') }}">Quiz and Time</a></li>
      <li><a href="{{ route('show-hadis') }}">Hadis</a></li>
      <li><a href="http://www.quran.gov.bd/" target="_blank">Al Quaran</a></li>
      <li><a href="{{ route('map') }}">Map</a></li>
      <li><a href="{{ route('appointment-list') }}">Imam</a></li>
      <li><a href="{{ route('blood-donation') }}">Blood Donate</a></li>
      <li><a href="{{ route('money-donation') }}">Donate</a></li>
      <li>
      <a class="log-out-btn text-danger p-1 pt-2 rounded"
                                            href="#"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                class="bx bx-power-off font-size-16 align-middle text-danger"></i>
                                            LogOut</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      </li>
      <a href="javascript:void(0);" class="icon" onclick="responsiveMenu()">
        <i class="fa fa-bars"></i>
      </a>
    </ul>
  </div>
</nav>
        <!-- End Nav Bar -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    {{$slot}}
                </div>
                <!-- container-fluid -->
            </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@stack('scripts')

<script>
    window.livewire.on('success', message => {
        Swal.fire({
            title: message.title || 'Success',
            text: message.text,
            type: 'success',
            confirmButtonColor: '#3b5de7'
        });
    });

    window.livewire.on('error', message => {
        Swal.fire({
            title: message.title || 'Error',
            text: message.text,
            type: 'error',
            confirmButtonColor: '#3b5de7'
        });
    });

    window.livewire.on('success_redirect', message => {
        Swal.fire({
            title: message.title || 'Success',
            text: message.text,
            type: 'success',
            confirmButtonColor: '#3b5de7'
        }).then(function () {
            window.location = message.url;
        });
    });
    window.livewire.on('success_redirect_href', message => {
        Swal.fire({
            title: message.title || 'Success',
            text: message.text,
            type: 'success',
            confirmButtonColor: '#3b5de7'
        }).then(function () {
            window.open( message.url, '_blank');
        });
    });
    window.livewire.on('reload', message => {

        window.location = message.url;

    });

    window.livewire.on('modal', message => {
            $('#'+message).modal('toggle');
    });


    window.livewire.on('confirm', message  =>
    {
        $('#'+message).modal('hide');
    });
    function getDateFormat(date = null) {
            if (date) {
                var now = new Date(date);
            } else {
                var now = new Date();
            }
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            return today;
        }
            $(document).ready(function () {

                $('.modal.printable').on('shown.bs.modal', function () {
                    $('.modal-dialog', this).addClass('focused');
                    $('body').addClass('modalprinter');

                }).on('hidden.bs.modal', function () {
                    $('.modal-dialog', this).removeClass('focused');
                    $('body').removeClass('modalprinter');
                });

                var date = new Date();
                var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
                var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                $('.currentDate').val(getDateFormat());
                $('.firstDate').val(getDateFormat(firstDay));
                $('.lastDate').val(getDateFormat(lastDay));
            });

</script>
</body>

</html>
