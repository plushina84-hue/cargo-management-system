@extends('layouts.app')


@section('content')


<div class="mb-4">


<h2 class="fw-bold">

<i class="bi bi-person-plus"></i>

Add New Driver

</h2>


<p class="text-muted">

Register driver information

</p>


</div>







<div class="card p-4">


<form method="POST" action="{{ route('driver.store') }}">


@csrf



<div class="row">





<div class="col-md-6 mb-3">


<label class="form-label">

Full Name

</label>


<input type="text"

name="name"

class="form-control"

placeholder="Driver name"

value="{{ old('name') }}">



@error('name')

<div class="text-danger">

{{ $message }}

</div>

@enderror


</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Email

</label>


<input type="email"

name="email"

class="form-control"

placeholder="driver@email.com"

value="{{ old('email') }}">



@error('email')

<div class="text-danger">

{{ $message }}

</div>

@enderror


</div>









<div class="col-md-6 mb-3">


<label class="form-label">

Phone Number

</label>


<input type="text"

name="phone"

class="form-control"

placeholder="07XXXXXXXX">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

License Number

</label>


<input type="text"

name="license_number"

class="form-control"

placeholder="License ID">



</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Password

</label>


<input type="password"

name="password"

class="form-control"

placeholder="********">



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



</select>



</div>







</div>







<div class="mt-4">


<button class="btn btn-primary">


<i class="bi bi-save"></i>

Save Driver


</button>





<a href="{{ route('driver.index') }}"

class="btn btn-secondary">


Cancel


</a>



</div>




</form>


</div>






@endsection
