@extends('layouts.app')


@section('content')


<div class="mb-4">

<h2 class="fw-bold">

<i class="bi bi-pencil-square"></i>

Edit Cargo

</h2>


<p class="text-muted">

Update shipment information

</p>


</div>







<div class="card p-4">


<form method="POST" action="{{ route('cargo.update',$cargo->id) }}">


@csrf

@method('PUT')






<div class="row">





<div class="col-md-6 mb-3">


<label class="form-label">

Tracking Number

</label>



<input type="text"

name="tracking_number"

class="form-control"

value="{{ $cargo->tracking_number }}">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Status

</label>



<select name="status"

class="form-select">



<option value="pending"

@if($cargo->status == 'pending') selected @endif>

Pending

</option>




<option value="picked"

@if($cargo->status == 'picked') selected @endif>

Picked

</option>





<option value="in_transit"

@if($cargo->status == 'in_transit') selected @endif>

In Transit

</option>





<option value="delivered"

@if($cargo->status == 'delivered') selected @endif>

Delivered

</option>



</select>


</div>







<div class="col-md-6 mb-3">


<label class="form-label">

Origin

</label>



<input type="text"

name="origin"

class="form-control"

value="{{ $cargo->origin }}">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Destination

</label>



<input type="text"

name="destination"

class="form-control"

value="{{ $cargo->destination }}">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Driver

</label>



<select name="driver_id"

class="form-select">



@foreach($drivers as $driver)


<option value="{{ $driver->id }}"

@if($cargo->driver_id == $driver->id)

selected

@endif>


{{ $driver->name }}


</option>


@endforeach



</select>


</div>









<div class="col-md-6 mb-3">


<label class="form-label">

Vehicle

</label>



<select name="vehicle_id"

class="form-select">



@foreach($vehicles as $vehicle)



<option value="{{ $vehicle->id }}"

@if($cargo->vehicle_id == $vehicle->id)

selected

@endif>



{{ $vehicle->registration_number }}



</option>



@endforeach



</select>


</div>





</div>








<div class="mt-4">


<button class="btn btn-success">


<i class="bi bi-check-circle"></i>

Update Cargo


</button>





<a href="{{ route('cargo.index') }}"

class="btn btn-secondary">


Cancel


</a>



</div>





</form>


</div>






@endsection
