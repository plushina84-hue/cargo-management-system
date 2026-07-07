@extends('layouts.app')


@section('content')


<h1 class="mb-4">

Dashboard

</h1>



<div class="row">


<div class="col-md-4">

<div class="card p-3">

<h5>Total Cargo</h5>

<h2>

{{ $totalCargo }}

</h2>

</div>

</div>





<div class="col-md-4">

<div class="card p-3">

<h5>Pending Cargo</h5>

<h2>

{{ $pendingCargo }}

</h2>

</div>

</div>






<div class="col-md-4">

<div class="card p-3">

<h5>Delivered Cargo</h5>

<h2>

{{ $deliveredCargo }}

</h2>

</div>

</div>




<div class="col-md-4 mt-3">

<div class="card p-3">

<h5>Drivers</h5>

<h2>

{{ $totalDrivers }}

</h2>

</div>

</div>





<div class="col-md-4 mt-3">

<div class="card p-3">

<h5>Vehicles</h5>

<h2>

{{ $totalVehicles }}

</h2>

</div>

</div>



</div>



@endsection
