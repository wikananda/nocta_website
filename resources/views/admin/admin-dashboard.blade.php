<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Dashboard</title>
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

    <body class='bg-whiteblue h-screen bg-cover relative' style="background-image: url('{{ asset('img/pattern.png') }}');">
        <header class='flex items-center justify-between px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-5 border-greenblue border-b bg-whiteblue z-10'>
            <a href='/'>
                <img
                    src='{{ asset("img/nocta-logo darkblue.png") }}'
                    alt='Nocta Studio Logo'
                    width='100'
                    class='xl:scale-100 scale-75'
                />
            </a>

            <div class='hidden md:flex items-center lg:space-x-16 md:space-x-6'>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 focus:outline-none focus:outline-4 focus:border-none hover:border-darkblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 focus:outline-none focus:outline-4 focus:border-none hover:border-darkblue transition-all' href='/feedback'>feedback</a>
                <button type='button' onclick="location.href='{{ route('admin.dashboard') }}';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue focus:outline-none focus:outline-8 transition-all'>
                    dashboard
                </button>
                <button type='button' onclick="location.href='{{ route('admin.logout') }}';" class='px-7 py-3 text-xl font-semibold text-darkblue border-transparent border-2 bg-lightred hover:bg-whiteblue hover:border-lightred hover:text-lightred focus:outline-none focus:outline-8 transition-all'>
                    logout
                </button>
            </div>
        </header>

        <div class='h-screen mt-36 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <h2 class='text-3xl font-medium text-darkblue'>welcome, <span class='text-lightred'>{{ Auth::guard('admin')->user()->username }}</span></h2>
            <div class='py-10 flex flex-row justify-between items-center'>
                <div class='flex flex-row justify-between w-2/3'>
                    <div class='text-darkblue'>
                        <h2 class='text-7xl text-lightred'>{{ $userCount }}</h2>
                        <p class='text-xl'>total registered accounts</p>
                    </div>
                    <div class='text-darkblue'>
                        <h2 class='text-7xl text-lightred'>{{ $testerCount }}</h2>
                        <p class='text-xl'>total registered testers</p>
                    </div>
                    <div class='text-darkblue'>
                        <h2 class='text-7xl text-lightred'>{{ $feedbackCount }}</h2>
                        <p class='text-xl'>total feedbacks</p>
                    </div>
                </div>
                
                <a href="" class='px-6 py-4 h-1/2 bg-greenblue text-whiteblue border-2 border-greenblue font-semibold hover:bg-whiteblue hover:text-greenblue transition-all focus:outline-none focus:outline-8'>details</a>

            </div>
            <a href="{{ route('admin.game-feedback', ['game' => 'Before Silence']) }}" class='w-full h-1/4 mt-5 bg-darkblue px-14 py-5 flex items-center hover:cursor-pointer hover:scale-105 transition-all'>
                <div class='w-full flex items-end'>
                    <h2 class='text-lightred text-3xl font-medium'>Before Silence</h2>
                </div>
                <div class='text-whiteblue flex flex-row space-x-10'>
                    <div class=''>
                        <h2 class='text-5xl text-lightred text-center'>{{ $game1TesterCount }}</h2>
                        <p class='text-xl text-center'>registered testers</p>
                    </div>
                    <div>
                        <h2 class='text-5xl text-lightred text-center'>{{ $game1FeedbackCount }}</h2>
                        <p class='text-xl text-center'>feedbacks</p>
                    </div>
                </div>

            </a>
            <a href="{{ route('admin.game-feedback', ['game' => 'Gravity Jump']) }}" class='w-full h-1/4 mt-10 bg-darkblue px-14 py-5 flex items-center hover:cursor-pointer hover:scale-105 transition-all'>
                <div class='w-full flex items-end'>
                    <h2 class='text-lightred text-3xl font-medium'>Gravity Jump</h2>
                </div>
                <div class='text-whiteblue flex flex-row space-x-10'>
                    <div class=''>
                        <h2 class='text-5xl text-lightred text-center'>{{ $game2TesterCount }}</h2>
                        <p class='text-xl text-center'>registered testers</p>
                    </div>
                    <div>
                        <h2 class='text-5xl text-lightred text-center'>{{ $game2FeedbackCount }}</h2>
                        <p class='text-xl text-center'>feedbacks</p>
                    </div>
                </div>
            </a>
        </div>
        </div>

        <footer class='h-screen/4 xl:h-screen/3 bg-darkblue px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-10 flex flex-col justify-center items-center mt-auto'>
            <div class='w-full flex items-center justify-between lg:justify-center space-x-0 lg:space-x-28'>
                <a href='/'>
                    <img
                        src='{{ asset("img/nocta-logo whiteblue.png") }}'
                        alt='Nocta Studio Logo'
                        width='100'
                        class='lg:scale-150 scale-100'
                    />
                </a>
    
                <div class='flex flex-col items-center space-y-2 lg:space-y-5'>
                    <a class='font-semibold text-lg md:text-xl text-whiteblue border-transparent border-b-2 hover:border-whiteblue transition-all' href='/games'>games</a>
                    <a class='font-semibold text-lg md:text-xl text-whiteblue border-transparent border-b-2 hover:border-whiteblue transition-all' href='/feedback'>feedback</a>
                </div>
            </div>
            <p class='block text-xs lg:text-sm text-whiteblue mt-10 font-light md:w-full lg:w-auto'>Copyright ©2023 Nocta Studio</p>
        </footer>
    </body>
</html>