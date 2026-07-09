<x-guest-layout>

<form method="POST" action="{{ route('register') }}">

@csrf



<!-- Name -->

<div>

<x-input-label 
for="name"
:value="__('Full Name')"
class="text-gray-700 font-semibold"
/>


<div class="mt-2">

<x-text-input

id="name"

class="block w-full rounded-xl border-gray-300
focus:border-blue-500 focus:ring-blue-500
shadow-sm py-3"

type="text"

name="name"

:value="old('name')"

required

autofocus

autocomplete="name"

placeholder="Enter your full name"

/>

</div>


<x-input-error 
:messages="$errors->get('name')"
class="mt-2"
/>


</div>





<!-- Email -->

<div class="mt-5">


<x-input-label

for="email"

:value="__('Email Address')"

class="text-gray-700 font-semibold"

/>


<div class="mt-2">


<x-text-input

id="email"

class="block w-full rounded-xl border-gray-300
focus:border-blue-500 focus:ring-blue-500
shadow-sm py-3"

type="email"

name="email"

:value="old('email')"

required

autocomplete="username"

placeholder="Enter your email"

/>


</div>


<x-input-error

:messages="$errors->get('email')"

class="mt-2"

/>


</div>





<!-- Password -->

<div class="mt-5">


<x-input-label

for="password"

:value="__('Password')"

class="text-gray-700 font-semibold"

/>


<div class="mt-2">


<x-text-input

id="password"

class="block w-full rounded-xl border-gray-300
focus:border-blue-500 focus:ring-blue-500
shadow-sm py-3"

type="password"

name="password"

required

autocomplete="new-password"

placeholder="Create password"

/>


</div>



<x-input-error

:messages="$errors->get('password')"

class="mt-2"

/>


</div>






<!-- Confirm Password -->


<div class="mt-5">


<x-input-label

for="password_confirmation"

:value="__('Confirm Password')"

class="text-gray-700 font-semibold"

/>


<div class="mt-2">


<x-text-input

id="password_confirmation"

class="block w-full rounded-xl border-gray-300
focus:border-blue-500 focus:ring-blue-500
shadow-sm py-3"

type="password"

name="password_confirmation"

required

autocomplete="new-password"

placeholder="Confirm password"

/>


</div>



</div>







<!-- Button -->

<div class="mt-8 flex items-center justify-between">


<a

href="{{ route('login') }}"

class="text-sm text-blue-600 hover:text-blue-800 font-semibold"

>

Already registered?

</a>



<x-primary-button>

Create Account

</x-primary-button>



</div>





</form>


</x-guest-layout>
