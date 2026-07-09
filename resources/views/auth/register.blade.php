<x-guest-layout>


<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 px-4">


<div class="w-full max-w-md">



<div class="text-center mb-8">


<div class="mx-auto w-20 h-20 rounded-full bg-blue-600 flex items-center justify-center">

⚓

</div>


<h1 class="text-3xl font-bold text-white mt-4">

Join Cargo System

</h1>


<p class="text-blue-300">

Create secure logistics account

</p>



</div>






<div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 shadow-2xl">



<form method="POST" action="{{route('register')}}">

@csrf



<div class="mb-4">

<label class="text-gray-200">
Full Name
</label>


<input

name="name"

required

placeholder="John Doe"

class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 text-white border border-white/30 outline-none"

>

</div>






<div class="mb-4">

<label class="text-gray-200">
Email Address
</label>


<input

type="email"

name="email"

required

placeholder="john@gmail.com"

class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 text-white border border-white/30 outline-none"

>

</div>






<div class="mb-4">

<label class="text-gray-200">
Password
</label>


<input

type="password"

name="password"

required

class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 text-white border border-white/30 outline-none"

>

</div>







<div class="mb-6">

<label class="text-gray-200">
Confirm Password
</label>


<input

type="password"

name="password_confirmation"

required

class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 text-white border border-white/30 outline-none"

>

</div>







<button

class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">


CREATE ACCOUNT


</button>





<p class="text-center text-gray-300 mt-6">


Already registered?


<a href="{{route('login')}}" class="text-blue-300">

Login

</a>


</p>




</form>


</div>


</div>


</div>


</x-guest-layout>
