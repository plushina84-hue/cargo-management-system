<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        Cargo Management System
    </title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



    <style>


        body{

            background:#f4f6f9;

        }



        .sidebar{

            height:100vh;

            width:250px;

            position:fixed;

            background:#212529;

            padding-top:20px;

        }




        .sidebar a{

            color:white;

            text-decoration:none;

            display:block;

            padding:12px 20px;

        }





        .sidebar a:hover{

            background:#343a40;

        }





        .content{

            margin-left:250px;

            padding:20px;

        }





        .topbar{

            margin-left:250px;

            background:white;

            padding:15px;

            box-shadow:0 2px 5px rgba(0,0,0,.1);

        }




        .card{

            border:none;

            border-radius:15px;

            box-shadow:0 5px 15px rgba(0,0,0,.08);

        }




        @media(max-width:768px){


            .sidebar{

                width:100%;

                height:auto;

                position:relative;

            }


            .content,
            .topbar{

                margin-left:0;

            }


        }



    </style>



</head>




<body>




@if(auth()->check())



<div class="sidebar">


<h4 class="text-white text-center mb-4">

<i class="bi bi-truck"></i>

Cargo System

</h4>




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

<i class="bi bi-search"></i>

Tracking

</a>





<a href="/profile">

<i class="bi bi-person"></i>

Profile

</a>




<form method="POST" action="/logout">

@csrf

<button class="btn btn-danger m-3">

<i class="bi bi-box-arrow-right"></i>

Logout

</button>


</form>



</div>





<div class="topbar">


<h5>

Welcome,

{{ auth()->user()->name }}

</h5>


</div>



@endif





<div class="content">


@yield('content')


</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>
