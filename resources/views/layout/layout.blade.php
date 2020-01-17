<!DOCTYPE html>
<html>
<head>
    <!--  -->
    <title>@yield('title', 'DonorFinder')</title>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Custom CS -->
    <style type="text/css">
        .navbar-default{
            background-color: #e60000;
            border-color: #E7E7E7;
        }

        #vertical_navbar{
            width: 180px;
            height: 490px;
        }

        #content{

        }
        /* Left column */
        .column.side {
            width: 25%;
        }

        /* Middle column */
        .column.middle {
            width: 50%;
        }

    </style>
</head>
<body>
<div>
    <nav class="navbar navbar-default">
        <a class="navbar-brand" href="#" style="color:white;"><i class='fa fa-heartbeat' style='font-size:20px;color:white;'></i>DonorFinder</a>
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt" style="color:white;font-size:20px;margin-left:auto;"></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</div>
<div class ="row">
    <div class="column side">
<div id="vertical_navbar">
    @yield('vertical_navbar')
</div>
    </div>
    <div class="column middle">
        @include('partials.alerts')
<div id="content">
    @yield('content')
</div>
</div>
</div>



</body>
</html>
