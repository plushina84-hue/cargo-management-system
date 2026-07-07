@extends('layouts.app')


@section('content')


<div class="mb-4">


<h2 class="fw-bold">

<i class="bi bi-truck-front"></i>

Add New Vehicle

</h2>


<p class="text-muted">

Register company vehicle information

</p>


</div>








<div class="card p-4">



<form method="POST" action="{{ route('vehicle.store') }}">


@csrf





<div class="row">





<div class="col-md-6 mb-3">


<label class="form-label">

Registration Number

</label>


<input type="text"

name="registration_number"

class="form-control"

placeholder="Example: T123 ABC"

value="{{ old('registration_number') }}">



@error('registration_number')

<div class="text-danger">

{{ $message }}

</div>

@enderror



</div>







<div class="col-md-6 mb-3">


<label class="form-label">

Model

</label>


<input type="text"

name="model"

class="form-control"

placeholder="Vehicle model"

value="{{ old('model') }}">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Vehicle Type

</label>



<select name="type"

class="form-select">



<option value="Truck">

Truck

</option>



<option value="Van">

Van

</option>



<option value="Trailer">

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

placeholder="Example: 10 Tons">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Status

</label>



<select name="status"

class="form-select">



<option value="available">

Available

</option>




<option value="busy">

Busy

</option>




<option value="maintenance">

Maintenance

</option>



</select>



</div>






</div>








<div class="mt-4">


<button class="btn btn-primary">


<i class="bi bi-save"></i>

Save Vehicle


</button>





<a href="{{ route('vehicle.index') }}"

class="btn btn-secondary">


Cancel


</a>



</div>







</form>


</div>






@endsection
