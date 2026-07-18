@extends('layouts.app')


@section('content')


<div class="mb-4">

<h2 class="fw-bold">

<i class="bi bi-person-badge"></i>

Driver Dashboard

</h2>


<p class="text-muted">

Manage your assigned cargo shipments

</p>


</div>







<div class="row g-4 mb-4">



<div class="col-md-4">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Assigned Cargo

</h6>


<h2 class="fw-bold">

{{ $assignedCargo ?? 0 }}

</h2>


</div>



<i class="bi bi-box-seam fs-1"></i>


</div>


</div>


</div>







<div class="col-md-4">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

In Transit

</h6>


<h2 class="fw-bold">

{{ $inTransit ?? 0 }}

</h2>


</div>



<i class="bi bi-truck fs-1"></i>


</div>


</div>


</div>







<div class="col-md-4">


<div class="card p-4">


<div class="d-flex justify-content-between">


<div>


<h6 class="text-muted">

Delivered

</h6>


<h2 class="fw-bold">

{{ $delivered ?? 0 }}

</h2>


</div>



<i class="bi bi-check-circle fs-1"></i>


</div>


</div>


</div>



</div>










<div class="card p-4">


<h4 class="mb-4">

My Cargo

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
Status
</th>


<th>
Action
</th>


</tr>


</thead>





<tbody>



@foreach($cargos ?? [] as $cargo)



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


@if($cargo->status == 'delivered')


<span class="badge bg-success">

Delivered

</span>



@elseif($cargo->status == 'in_transit')


<span class="badge bg-warning text-dark">

In Transit

</span>



@else


<span class="badge bg-secondary">

{{ $cargo->status }}

</span>


@endif



</td>





<td>


<a href="{{ route('tracking', ['code' => $cargo->tracking_number]) }}"

class="btn btn-sm btn-primary">


<i class="bi bi-eye"></i>

View

</a>


</td>




</tr>



@endforeach



</tbody>



</table>


</div>


</div>





@endsection
