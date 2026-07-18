@extends('layouts.app')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h2 class="fw-bold">

<i class="bi bi-person-badge"></i>

Drivers Management

</h2>


<p class="text-muted">

Manage all system drivers

</p>


</div>




<a href="{{ route('driver.create') }}"

class="btn btn-primary">


<i class="bi bi-person-plus"></i>

Add Driver


</a>



</div>







<div class="card p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>

<th>#</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>License</th>

<th>Status</th>

<th>Action</th>

</tr>


</thead>





<tbody>



@forelse($drivers as $driver)



<tr>


<td>

{{ $loop->iteration }}

</td>




<td>

<strong>

{{ $driver->name }}

</strong>

</td>





<td>

{{ $driver->user->email ?? 'No Email' }}

</td>





<td>

{{ $driver->phone ?? 'N/A' }}

</td>





<td>

{{ $driver->license_number ?? 'N/A' }}

</td>







<td>


@if(($driver->availability ?? '') == 'available')


<span class="badge bg-success">

Available

</span>



@else


<span class="badge bg-secondary">

{{ $driver->availability ?? 'Inactive' }}

</span>


@endif



</td>








<td>



<a href="{{ route('driver.show',$driver->id) }}"

class="btn btn-sm btn-info">


<i class="bi bi-eye"></i>


</a>






<a href="{{ route('driver.edit',$driver->id) }}"

class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>


</a>






<form action="{{ route('driver.destroy',$driver->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button class="btn btn-sm btn-danger"

onclick="return confirm('Delete this driver?')">


<i class="bi bi-trash"></i>


</button>



</form>




</td>



</tr>





@empty


<tr>


<td colspan="7" class="text-center">


No drivers found


</td>


</tr>


@endforelse




</tbody>



</table>


</div>


</div>






@endsection
