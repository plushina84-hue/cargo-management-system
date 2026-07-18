@extends('layouts.app')


@section('content')


<div class="mb-4">

<h2 class="fw-bold">

<i class="bi bi-plus-circle"></i>

Create New Cargo

</h2>


<p class="text-muted">

Add shipment information

</p>


</div>







<div class="card p-4">


<form method="POST" action="{{ route('cargo.store') }}">

@csrf





<div class="row">



<div class="col-md-6 mb-3">


<label class="form-label">

Tracking Number

</label>


<input type="text"

name="tracking_number"

class="form-control"

placeholder="Example: CARGO001"

value="{{ old('tracking_number') }}">



@error('tracking_number')

<div class="text-danger">

{{ $message }}

</div>

@enderror


</div>







<div class="col-md-6 mb-3">


<label class="form-label">

Status

</label>


<select name="status"

class="form-select">


<option value="pending">

Pending

</option>



<option value="picked">

Picked

</option>



<option value="in_transit">

In Transit

</option>



<option value="delivered">

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

placeholder="Starting location"

value="{{ old('origin') }}">


</div>







<div class="col-md-6 mb-3">


<label class="form-label">

Destination

</label>


<input type="text"

name="destination"

class="form-control"

placeholder="Delivery location"

value="{{ old('destination') }}">


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Weight (kg)

</label>


<input type="number"

name="weight"

class="form-control"

min="1"

placeholder="Example: 500"

value="{{ old('weight') }}">


@error('weight')

<div class="text-danger">

{{ $message }}

</div>

@enderror


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Cargo Type

</label>


<input type="text"

name="cargo_type"

class="form-control"

placeholder="Example: Electronics"

value="{{ old('cargo_type') }}">


@error('cargo_type')

<div class="text-danger">

{{ $message }}

</div>

@enderror


</div>









<div class="col-md-6 mb-3">


<label class="form-label">

Assign Driver

</label>


<select name="driver_id"

class="form-select">


<option value="">

Select Driver

</option>



@foreach($drivers as $driver)


<option value="{{ $driver->id }}">


{{ $driver->name }}


</option>


@endforeach



</select>


</div>









<div class="col-md-6 mb-3">


<label class="form-label">

Assign Vehicle

</label>


<select name="vehicle_id"

class="form-select">


<option value="">

Select Vehicle

</option>



@foreach($vehicles as $vehicle)


<option value="{{ $vehicle->id }}">


{{ $vehicle->plate_number }}


</option>


@endforeach



</select>


</div>







</div>







<div class="mt-4">


<button class="btn btn-primary">


<i class="bi bi-save"></i>

Save Cargo


</button>





<a href="{{ route('cargo.index') }}"

class="btn btn-secondary">


Cancel

</a>


</div>





</form>


</div>






@endsection
