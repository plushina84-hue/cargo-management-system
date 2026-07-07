@extends('layouts.app')


@section('content')


<div class="mb-4">


<h2 class="fw-bold">

<i class="bi bi-pencil-square"></i>

Edit Driver

</h2>


<p class="text-muted">

Update driver information

</p>


</div>







<div class="card p-4">


<form method="POST" action="{{ route('driver.update',$driver->id) }}">


@csrf

@method('PUT')





<div class="row">





<div class="col-md-6 mb-3">


<label class="form-label">

Full Name

</label>


<input type="text"

name="name"

class="form-control"

value="{{ $driver->name }}">


</div>







<div class="col-md-6 mb-3">


<label class="form-label">

Phone

</label>


<input type="text"

name="phone"

class="form-control"

value="{{ $driver->phone }}">


</div>







<div class="col-md-6 mb-3">


<label class="form-label">

License Number

</label>


<input type="text"

name="license_number"

class="form-control"

value="{{ $driver->license_number }}">


</div>








<div class="col-md-6 mb-3">


<label class="form-label">

Status

</label>



<select name="status"

class="form-select">



<option value="available"

@if($driver->status == 'available')

selected

@endif>

Available

</option>




<option value="busy"

@if($driver->status == 'busy')

selected

@endif>

Busy

</option>



</select>



</div>






</div>






<div class="mt-4">


<button class="btn btn-success">


<i class="bi bi-check-circle"></i>

Update Driver


</button>





<a href="{{ route('driver.index') }}"

class="btn btn-secondary">


Cancel


</a>



</div>





</form>


</div>






@endsection
