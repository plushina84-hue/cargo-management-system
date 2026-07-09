<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-950">


<div class="w-full max-w-md bg-gray-900 p-8 rounded-2xl shadow-2xl border border-green-500">


<h1 class="text-center text-3xl font-bold text-green-400 mb-6">

CREATE ACCOUNT

</h1>



<form method="POST" action="{{route('register')}}">

@csrf



<div>

<label class="text-gray-300">
Name
</label>

<input
name="name"
required
class="w-full mt-2 p-3 bg-gray-800 text-white rounded-lg border border-gray-700"
>


</div>




<div class="mt-4">

<label class="text-gray-300">
Email
</label>


<input
type="email"
name="email"
required
class="w-full mt-2 p-3 bg-gray-800 text-white rounded-lg border border-gray-700"
>


</div>




<div class="mt-4">

<label class="text-gray-300">
Password
</label>


<input
type="password"
name="password"
required
class="w-full mt-2 p-3 bg-gray-800 text-white rounded-lg border border-gray-700"
>


</div>





<div class="mt-4">

<label class="text-gray-300">
Confirm Password
</label>


<input
type="password"
name="password_confirmation"
required
class="w-full mt-2 p-3 bg-gray-800 text-white rounded-lg border border-gray-700"
>


</div>




<button
class="w-full mt-6 bg-green-600 hover:bg-green-700 py-3 rounded-lg text-white font-bold">

REGISTER

</button>




<div class="text-center mt-5">

<a href="{{route('login')}}" class="text-green-400">

Already have account?

</a>

</div>



</form>



</div>


</div>


</x-guest-layout>
