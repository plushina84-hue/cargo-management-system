<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Cargo Management System
    </title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



    <style>


        body{

            background:#f5f7fb;

            font-family: 'Segoe UI', sans-serif;

        }



        /* Sidebar */

        .sidebar{

            width:260px;

            height:100vh;

            position:fixed;

            left:0;

            top:0;

            background:#111827;

            color:white;

            padding-top:20px;

            transition:.3s;

        }





        .sidebar .brand{

            font-size:22px;

            font-weight:bold;

            text-align:center;

            margin-bottom:30px;

        }





        .sidebar a{

            display:block;

            color:#cbd5e1;

            text-decoration:none;

            padding:14px 25px;

            transition:.3s;

        }




        .sidebar a:hover{

            background:#1f2937;

            color:white;

        }




        .sidebar i{

            margin-right:10px;

        }







        /* Navbar */


        .navbar-custom{

            margin-left:260px;

            height:70px;

            background:white;

            display:flex;

            justify-content:space-between;

            align-items:center;

            padding:0 30px;

            box-shadow:0 2px 10px rgba(0,0,0,.05);

        }





        /* Content */


        .main-content{

            margin-left:260px;

            padding:30px;

        }







        .card{

            border:none;

            border-radius:15px;

            box-shadow:0 5px 20px rgba(0,0,0,.08);

        }







        @media(max-width:768px){



            .sidebar{

                position:relative;

                width:100%;

                height:auto;

            }



            .navbar-custom,

            .main-content{

                margin-left:0;

            }



        }



    </style>



</head>



<body>



@if(auth()->check())



<!-- SIDEBAR -->

<div class="sidebar">


<div class="brand">

<i class="bi bi-truck"></i>

Cargo System

</div>





<a href="/dashboard">

<i class="bi bi-speedometer2"></i>

Dashboard

</a>





@if(auth()->user()->role == 'admin')


<a href="/cargo">

<i class="bi bi-box-seam"></i>

Cargo

</a>



<a href="/driver">

<i class="bi bi-person-badge"></i>

Drivers

</a>




<a href="/vehicle">

<i class="bi bi-truck-front"></i>

Vehicles

</a>


@endif





<a href="/tracking">

<i class="bi bi-geo-alt"></i>

Tracking

</a>




<a href="/notifications">

<i class="bi bi-bell"></i>

Notifications

</a>




<a href="/profile">

<i class="bi bi-person-circle"></i>

Profile

</a>





<form method="POST" action="/logout">

@csrf


<button class="btn btn-danger mx-3 mt-3 w-75">

<i class="bi bi-box-arrow-right"></i>

Logout

</button>


</form>



</div>






<!-- NAVBAR -->

<div class="navbar-custom">


<h5 class="mb-0">

Welcome,

{{ auth()->user()->name }}

</h5>





<div>


<i class="bi bi-person-circle fs-4"></i>


</div>



</div>




@endif






<!-- PAGE CONTENT -->


<div class="main-content">


@isset($slot)
    {{ $slot }}
@else
    @yield('content')
@endisset


</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
