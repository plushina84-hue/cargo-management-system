@extends('layouts.app')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h2 class="fw-bold">

<i class="bi bi-box-seam"></i>

Cargo Management

</h2>


<p class="text-muted">

Manage all shipments

</p>


</div>




<a href="{{ route('cargo.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

Add Cargo

</a>


</div>








<div class="card p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>

<th>#</th>

<th>Tracking</th>

<th>Route</th>

<th>Driver</th>

<th>Vehicle</th>

<th>Status</th>

<th>Action</th>

</tr>


</thead>





<tbody>



@forelse($cargos as $cargo)



<tr>


<td>

{{ $loop->iteration }}

</td>




<td>


<strong>

{{ $cargo->tracking_number }}

</strong>


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

{{ $cargo->vehicle->plate_number ?? 'Not Assigned' }}

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





@elseif($cargo->status == 'picked')


<span class="badge bg-info">

Picked

</span>





@else


<span class="badge bg-secondary">

{{ ucfirst($cargo->status) }}

</span>



@endif



</td>







<td>



<a href="{{ route('cargo.show',$cargo->id) }}"

class="btn btn-sm btn-info">


<i class="bi bi-eye"></i>

</a>





<a href="{{ route('cargo.edit',$cargo->id) }}"

class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>

</a>







<form action="{{ route('cargo.destroy',$cargo->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button type="submit"

class="btn btn-sm btn-danger"

onclick="return confirm('Delete this cargo?')">


<i class="bi bi-trash"></i>


</button>



</form>




</td>




</tr>





@empty


<tr>


<td colspan="7" class="text-center">


No cargo available


</td>


</tr>



@endforelse





</tbody>



</table>


</div>


</div>






@endsection
