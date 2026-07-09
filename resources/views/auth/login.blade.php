<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-950">

    <div class="w-full max-w-md bg-gray-900 rounded-2xl shadow-2xl p-8 border border-green-500">

        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold text-green-400">
                CYBER CARGO SYSTEM
            </h1>

            <p class="text-gray-400 mt-2">
                Secure Port Management Login
            </p>

        </div>



        <form method="POST" action="{{ route('login') }}">

            @csrf


            <!-- Email -->

            <div>

                <label class="text-gray-300">
                    Email Address
                </label>


                <input
                type="email"
                name="email"
                value="{{old('email')}}"
                required
                class="w-full mt-2 p-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-green-500 focus:ring-green-500"
                >


                <x-input-error 
                :messages="$errors->get('email')" 
                class="mt-2 text-red-400" />

            </div>




            <!-- Password -->


            <div class="mt-5">

                <label class="text-gray-300">
                    Password
                </label>


                <input
                type="password"
                name="password"
                required
                class="w-full mt-2 p-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-green-500 focus:ring-green-500"
                >


                <x-input-error 
                :messages="$errors->get('password')" 
                class="mt-2 text-red-400" />


            </div>




            <!-- Remember -->


            <div class="mt-5">

                <label class="text-gray-400">

                    <input 
                    type="checkbox"
                    name="remember"
                    >

                    Remember me

                </label>

            </div>




            <button
            class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition">

                LOGIN SYSTEM

            </button>




            <div class="text-center mt-5">

                <a 
                href="{{route('register')}}"
                class="text-green-400 hover:underline">

                    Create New Account

                </a>

            </div>


        </form>


    </div>

</div>


</x-guest-layout>
