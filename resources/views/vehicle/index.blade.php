@extends('layouts.app')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>


<h2 class="fw-bold">

<i class="bi bi-truck-front"></i>

Vehicle Management

</h2>


<p class="text-muted">

Manage company vehicles

</p>


</div>




<a href="{{ route('vehicle.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

Add Vehicle


</a>



</div>







<div class="card p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>

<th>#</th>

<th>Registration</th>

<th>Model</th>

<th>Type</th>

<th>Capacity</th>

<th>Status</th>

<th>Action</th>

</tr>


</thead>





<tbody>



@forelse($vehicles as $vehicle)



<tr>


<td>

{{ $loop->iteration }}

</td>





<td>

<strong>

{{ $vehicle->registration_number }}

</strong>

</td>






<td>

{{ $vehicle->model ?? 'N/A' }}

</td>






<td>

{{ $vehicle->type ?? 'N/A' }}

</td>






<td>

{{ $vehicle->capacity ?? 'N/A' }}

</td>







<td>



@if(($vehicle->status ?? '') == 'available')


<span class="badge bg-success">

Available

</span>




@elseif(($vehicle->status ?? '') == 'busy')


<span class="badge bg-warning text-dark">

Busy

</span>




@else


<span class="badge bg-secondary">

{{ $vehicle->status ?? 'Inactive' }}

</span>



@endif



</td>








<td>



<a href="{{ route('vehicle.show',$vehicle->id) }}"

class="btn btn-sm btn-info">


<i class="bi bi-eye"></i>


</a>





<a href="{{ route('vehicle.edit',$vehicle->id) }}"

class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>


</a>






<form action="{{ route('vehicle.destroy',$vehicle->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button class="btn btn-sm btn-danger"

onclick="return confirm('Delete vehicle?')">


<i class="bi bi-trash"></i>


</button>



</form>



</td>



</tr>





@empty


<tr>


<td colspan="7"

class="text-center">


No vehicles found


</td>


</tr>



@endforelse



</tbody>



</table>


</div>


</div>






@endsection
