<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Cargo Management System
    </title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-700 to-cyan-600 flex items-center justify-center">


<div class="w-full max-w-md">


    <div class="bg-white rounded-3xl shadow-2xl p-8">


        <div class="text-center mb-8">


            <div class="mx-auto w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center shadow-lg">

                <span class="text-white text-2xl font-bold">
                    CMS
                </span>

            </div>


            <h1 class="mt-4 text-2xl font-bold text-gray-800">

                Cargo Management System

            </h1>


            <p class="text-gray-500 text-sm mt-2">

                Secure Logistics Platform

            </p>


        </div>


        {{ $slot }}


    </div>


</div>


</body>

</html>
