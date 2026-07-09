<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 px-4">


    <div class="w-full max-w-md">


        <!-- Logo Area -->

        <div class="text-center mb-8">

            <div class="mx-auto w-20 h-20 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">

                <span class="text-white text-3xl font-bold">
                    ⚓
                </span>

            </div>


            <h1 class="mt-5 text-3xl font-bold text-white">

                Cargo Management System

            </h1>


            <p class="text-blue-300 mt-2">

                Secure Port Logistics Platform

            </p>


        </div>





        <!-- Login Card -->

        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl p-8">


            <h2 class="text-xl font-semibold text-white mb-6">

                Sign in to your account

            </h2>




            <form method="POST" action="{{ route('login') }}">

                @csrf




                <!-- Email -->

                <div class="mb-5">


                    <label class="block text-sm text-gray-200 mb-2">

                        Email Address

                    </label>


                    <input

                    type="email"

                    name="email"

                    required

                    autofocus

                    placeholder="example@gmail.com"

                    class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"

                    >



                </div>







                <!-- Password -->

                <div class="mb-5">


                    <label class="block text-sm text-gray-200 mb-2">

                        Password

                    </label>



                    <input

                    type="password"

                    name="password"

                    required

                    placeholder="********"

                    class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"

                    >



                </div>






                <div class="flex justify-between items-center mb-6">


                    <label class="text-sm text-gray-300">

                        <input type="checkbox" name="remember">

                        Remember me

                    </label>



                    <a href="#" class="text-sm text-blue-300">

                        Forgot password?

                    </a>



                </div>






                <button

                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition duration-300 shadow-lg">


                    LOGIN TO SYSTEM


                </button>







                <p class="text-center text-gray-300 mt-6">


                    Don't have account?


                    <a href="{{route('register')}}" class="text-blue-300 font-semibold">

                        Create Account

                    </a>


                </p>




            </form>


        </div>


    </div>


</div>


</x-guest-layout>
