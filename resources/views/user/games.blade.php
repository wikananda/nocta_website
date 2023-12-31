<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nocta Studio | Game</title>
        @vite('resources/css/app.css')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body class='bg-whiteblue'>
        <header class='flex items-center justify-between px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-5 border-greenblue border-b'>
            <a href='/'>
                <img
                    src='{{ asset("img/nocta-logo.png") }}'
                    alt='Nocta Studio Logo'
                    width='100'
                />
            </a>

            <div class='hidden md:flex items-center lg:space-x-16 md:space-x-6'>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/feedback'>feedback</a>
                <button type='button' onclick="location.href='/login';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                    login
                </button>
            </div>
        </header>

        <div class='h-screen px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col justify-center' style="background-image: url('{{ asset('img/pattern.png') }}');">
            <h2 class='text-4xl font-medium text-darkblue'>our games.</h2>
            <div class='mt-10 mb-24 flex flex-row space-x-16 justify-evenly'>
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 hover:scale-105">
                    <a href="/before-silence">
                        <img class="rounded-none shadow dark:rounded-none dark:bg-gray-800 dark:border-gray-700" src="{{ asset('img/Before Silence Banner.png') }}" alt="before-silence">
                    </a>
                    <p class='text-2xl font-medium text-darkblue mt-2'>Before Silence</p>
                </figure>
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 hover:scale-105">
                    <a href="/gravity-jump">
                        <img class="rounded-none shadow dark:rounded-none dark:bg-gray-800 dark:border-gray-700" src="{{ asset('img/Gravity Jump Banner.png') }}" alt="gravity-jump">
                    </a>
                    <p class='text-2xl font-medium text-darkblue mt-2'>Gravity Jump</p>
                </figure>
            </div>
        </div>

    </body>
</html>