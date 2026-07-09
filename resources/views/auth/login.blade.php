<x-guest-layout>

<form method="POST" action="{{ route('login') }}">

    @csrf


    <!-- Email -->

    <div>

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
                autofocus
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

                autocomplete="current-password"

                placeholder="Enter your password"

            />


        </div>


        <x-input-error 
            :messages="$errors->get('password')" 
            class="mt-2"
        />


    </div>





    <!-- Remember -->

    <div class="mt-5">


        <label class="inline-flex items-center">


            <input 

            type="checkbox"

            name="remember"

            class="rounded border-gray-300 
            text-blue-600 shadow-sm 
            focus:ring-blue-500"


            >


            <span class="ml-2 text-sm text-gray-600">

                Remember me

            </span>


        </label>


    </div>






    <!-- Button -->


    <div class="mt-8 flex items-center justify-between">


        @if (Route::has('password.request'))

        <a 
        class="text-sm text-blue-600 hover:text-blue-800 font-medium"
        href="{{ route('password.request') }}"
        >

            Forgot password?

        </a>


        @endif



        <x-primary-button>

            Login

        </x-primary-button>


    </div>






    <!-- Register link -->

    <div class="text-center mt-8">


        <p class="text-sm text-gray-600">

            Don't have an account?


            <a 
            href="{{ route('register') }}"
            class="text-blue-600 font-semibold hover:underline"
            >

            Create Account

            </a>


        </p>


    </div>



</form>


</x-guest-layout>
