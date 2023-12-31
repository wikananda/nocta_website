<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nocta Studio | Indie Game Studio</title>
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
            <a href='/welcome'>
                <img
                    src='{{ asset("img/nocta-logo.png") }}'
                    alt='Nocta Studio Logo'
                    width='100'
                />
            </a>

            {{-- <div class='hidden md:flex items-center lg:space-x-16 md:space-x-6'>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/feedback'>feedback</a>
                <button type='button' onclick="location.href='/login';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                    login
                </button>
            </div> --}}
            <div class='hidden md:flex items-center lg:space-x-16 md:space-x-6'>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/feedback'>feedback</a>
            
                @guest
                    <button type='button' onclick="location.href='/login';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                        login
                    </button>
                @else
                    <div class="flex items-center space-x-4">
                        <span class="text-xl font-semibold text-black">{{ Auth::user()->name }}</span>
                        <!-- Add logout button or link here -->
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="text-xl font-semibold text-whiteblue">logout</button>
                        </form>
                    </div>
                @endguest
            </div>
            

        </header>

        <div class='h-screen bg-cover relative' style="background-image: url('{{ asset('img/pattern.png') }}');">
            <h1 class='z-10 text-8xl font-medium absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-darkblue'>no<span class='font-alternates text-7xl font-bold'>c</span>ta <span class='font-alternates font-light'>studio</span></h1>
            <div class='absolute top-0 left-0 w-full h-full flex justify-center items-center'>
                <img
                    src='{{ asset("img/amelia.png") }}'
                    alt='amelia'
                    width='25%'
                    class='mt-40 mr-20'
                />
                <img
                    src='{{ asset("img/babado.png") }}'
                    alt='babado'
                    width='21%'
                    class='mb-96 ml-48'
                />
            </div>
        </div>
        <div class='flex flex-col justify-center px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <p class='mt-32 text-4xl font-normal text-darkblue'>we are <span class='text-4xl font-normal'>independent video game studio</span> <br> based in Bali, Indonesia</p>
            <img
                    src='{{ asset("img/Before Silence.png") }}'
                    alt='amelia'
                    width='85%'
                    class='mt-52'
            />
        </div>

        <div class='h-screen px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <div class='h-screen flex flex-col items-center justify-center'>
                <p class='text-2xl font-light text-darkblue'>we pursue a clear goal:</p>
                <div class='h-3/5 flex flex-col justify-center'>
                    <p class='text-6xl font-medium text-lightred mr-52'>CReaTivity,</p>
                    <p class='text-6xl font-medium text-greenblue ml-52'>imagination</p>
                </div>
                <p class='text-2xl font-light text-darkblue'>and <span class='text-6xl font-medium text-lightred'>FuN</span> aspect in each of our games</p>
            </div>
        </div>

        <div class='h-screen px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col justify-center'>
            <h2 class='text-3xl font-medium text-darkblue'>we are a growing team, and we need your help</h2>
            <p class='text-2xl font-light text-darkblue mt-5'>we are currently developing three games, <br> we would really appreciate if you could test and provide feedbacks for us.</p>
            <div class='mt-10 flex space-x-16'>
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
            <button type='button' onclick="location.href='/register';" class='w-1/6 mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                become tester
            </button>
        </div>
    </body>
</html>