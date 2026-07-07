@extends('layouts.app')


@section('content')


<div class="mb-4">


<h2 class="fw-bold">

<i class="bi bi-pencil-square"></i>

Edit Vehicle

</h2>


<p class="text-muted">

Update vehicle information

</p>


</div>







<div class="card p-4">


<form method="POST" action="{{ route('vehicle.update',$vehicle->id) }}">


@csrf

@method('PUT')






<div class="row">





<div class="col-md-6 mb-3">


<label class="form-label">

Registration Number

</label>


<input type="text"

name="registration_number"

class="form-control"

value="{{ $vehicle->registration_number }}">


</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Model

</label>


<input type="text"

name="model"

class="form-control"

value="{{ $vehicle->model }}">


</div>







<div class="col-md-6 mb-3">


<label class="form-label">

Vehicle Type

</label>



<select name="type"

class="form-select">



<option value="Truck"

@if($vehicle->type == 'Truck') selected @endif>

Truck

</option>



<option value="Van"

@if($vehicle->type == 'Van') selected @endif>

Van

</option>



<option value="Trailer"

@if($vehicle->type == 'Trailer') selected @endif>

Trailer

</option>



</select>


</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Capacity

</label>


<input type="text"

name="capacity"

class="form-control"

value="{{ $vehicle->capacity }}">


</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Status

</label>



<select name="status"

class="form-select">



<option value="available"

@if($vehicle->status == 'available') selected @endif>

Available

</option>





<option value="busy"

@if($vehicle->status == 'busy') selected @endif>

Busy

</option>





<option value="maintenance"

@if($vehicle->status == 'maintenance') selected @endif>

Maintenance

</option>



</select>


</div>






</div>








<div class="mt-4">


<button class="btn btn-success">


<i class="bi bi-check-circle"></i>

Update Vehicle


</button>





<a href="{{ route('vehicle.index') }}"

class="btn btn-secondary">


Cancel


</a>



</div>






</form>


</div>






@endsection
