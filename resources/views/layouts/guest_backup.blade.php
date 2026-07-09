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

background:#f5f7fb;

min-height:100vh;

display:flex;

align-items:center;

justify-content:center;

}



.auth-card{

background:white;

padding:35px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,.1);

width:100%;

max-width:450px;

}



.logo{

text-align:center;

font-size:35px;

color:#0d6efd;

margin-bottom:20px;

}



</style>


</head>



<body>



<div class="auth-card">


<div class="logo">

<i class="bi bi-truck"></i>

</div>



<h3 class="text-center mb-4">

Cargo Management System

</h3>



{{ $slot }}



</div>




</body>


</html>
