<!DOCTYPE html>

<html>

<head>

<title>
Cargo Tracking
</title>

</head>


<body>


<h1>
🚚 Cargo Tracking System
</h1>



<form action="{{ route('tracking.search') }}" method="POST">


@csrf


<input 
type="text"
name="tracking_number"
placeholder="Enter Tracking Number"
required>


<button>
Search
</button>


</form>



<hr>



@if(isset($cargo))


<h2>
Cargo Details
</h2>


<p>
Tracking Number:
{{ $cargo->tracking_number }}
</p>


<p>
Origin:
{{ $cargo->origin }}
</p>


<p>
Destination:
{{ $cargo->destination }}
</p>


<p>
Weight:
{{ $cargo->weight }}
</p>


<p>
Cargo Type:
{{ $cargo->cargo_type }}
</p>


<p>
Status:
{{ $cargo->status }}
</p>



<p>
Driver:

{{ $cargo->driver->name ?? 'Not Assigned' }}

</p>



<p>
Vehicle:

{{ $cargo->vehicle->plate_number ?? 'Not Assigned' }}

</p>



@elseif(request()->has('tracking_number'))


<h3>
Cargo Not Found
</h3>


@endif



</body>

</html>
