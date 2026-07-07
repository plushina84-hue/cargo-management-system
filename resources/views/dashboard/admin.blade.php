@extends('layouts.app')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h2 class="fw-bold">

<i class="bi bi-speedometer2"></i>

Admin Dashboard

</h2>


<p class="text-muted">

Cargo Management Overview

</p>


</div>



</div>







<div class="row g-4">





<!-- Cargo -->

<div class="col-md-4">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Total Cargo

</h6>


<h2 class="fw-bold">

{{ $totalCargo }}

</h2>


</div>



<i class="bi bi-box-seam fs-1 text-primary"></i>


</div>


</div>


</div>








<!-- Pending -->

<div class="col-md-4">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Pending

</h6>


<h2 class="fw-bold">

{{ $pendingCargo }}

</h2>


</div>



<i class="bi bi-clock-history fs-1 text-warning"></i>


</div>


</div>


</div>








<!-- Delivered -->

<div class="col-md-4">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Delivered

</h6>


<h2 class="fw-bold">

{{ $deliveredCargo }}

</h2>


</div>



<i class="bi bi-check-circle fs-1 text-success"></i>


</div>


</div>


</div>







<!-- Drivers -->


<div class="col-md-6">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Drivers

</h6>


<h2 class="fw-bold">

{{ $totalDrivers }}

</h2>


</div>



<i class="bi bi-person-badge fs-1"></i>


</div>


</div>


</div>







<!-- Vehicles -->


<div class="col-md-6">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Vehicles

</h6>


<h2 class="fw-bold">

{{ $totalVehicles }}

</h2>


</div>



<i class="bi bi-truck fs-1"></i>


</div>


</div>


</div>



</div>










<div class="card mt-5 p-4">


<h4 class="mb-4">

Recent Cargo

</h4>



<div class="table-responsive">


<table class="table table-hover">


<thead>


<tr>

<th>

Tracking

</th>


<th>

Route

</th>


<th>

Driver

</th>


<th>

Status

</th>


</tr>


</thead>




<tbody>



@foreach($recentCargo as $cargo)



<tr>


<td>

{{ $cargo->tracking_number }}

</td>




<td>

{{ $cargo->origin }}

<i class="bi bi-arrow-right"></i>

{{ $cargo->destination }}

</td>




<td>

{{ $cargo->driver->name ?? 'Not Assigned' }}

</td>




<td>



@if($cargo->status == 'delivered')


<span class="badge bg-success">

Delivered

</span>



@elseif($cargo->status == 'in_transit')


<span class="badge bg-warning">

In Transit

</span>



@else


<span class="badge bg-secondary">

{{ $cargo->status }}

</span>


@endif



</td>




</tr>



@endforeach



</tbody>


</table>


</div>


</div>






@endsection
