@extends('layouts.app')


@section('content')


<div class="mb-4 text-center">


<h2 class="fw-bold">

<i class="bi bi-geo-alt"></i>

Track Your Cargo

</h2>


<p class="text-muted">

Enter tracking number to check shipment status

</p>


</div>








<div class="card p-4 mb-4">


<form method="GET" action="{{ route('tracking') }}">


<div class="input-group">


<input type="text"

name="code"

class="form-control"

placeholder="Enter tracking number"

value="{{ request('code') }}">



<button class="btn btn-primary">


<i class="bi bi-search"></i>

Track


</button>



</div>


</form>


</div>










@if(isset($cargo))



<div class="card p-4">


<h4 class="mb-4">

Shipment Information

</h4>






<div class="row">



<div class="col-md-6">


<p>

<strong>

Tracking Number:

</strong>

<br>

{{ $cargo->tracking_number }}

</p>



</div>







<div class="col-md-6">


<p>

<strong>

Status:

</strong>

<br>


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


</p>


</div>







<div class="col-md-6">


<p>

<strong>

From:

</strong>

<br>


{{ $cargo->origin }}


</p>


</div>






<div class="col-md-6">


<p>

<strong>

To:

</strong>

<br>


{{ $cargo->destination }}


</p>


</div>







</div>







<hr>





<h5 class="mb-3">

Shipment Progress

</h5>






<div class="progress mb-4"

style="height:20px;">



@if($cargo->status == 'pending')


<div class="progress-bar bg-secondary"

style="width:25%">

Pending

</div>



@elseif($cargo->status == 'picked')


<div class="progress-bar bg-info"

style="width:50%">

Picked

</div>



@elseif($cargo->status == 'in_transit')


<div class="progress-bar bg-warning"

style="width:75%">

In Transit

</div>



@elseif($cargo->status == 'delivered')


<div class="progress-bar bg-success"

style="width:100%">

Delivered

</div>



@endif



</div>







<div class="row text-center">



<div class="col">

<i class="bi bi-box fs-2"></i>

<p>

Created

</p>

</div>




<div class="col">

<i class="bi bi-truck fs-2"></i>

<p>

Transport

</p>

</div>





<div class="col">

<i class="bi bi-check-circle fs-2"></i>

<p>

Delivered

</p>

</div>



</div>







</div>






@endif







@endsection
