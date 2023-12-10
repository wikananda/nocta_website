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

    <body class='bg-darkblue'>
        <header class='flex items-center justify-between px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-5 border-none bg-transparent'>
            <a href='/'>
                <img
                    src='{{ asset("img/nocta-logo whiteblue.png") }}'
                    alt='Nocta Studio Logo'
                    width='100'
                    class='xl:scale-100 scale-75'
                />
            </a>

            <div class='hidden md:flex items-center lg:space-x-16 md:space-x-6'>
                <a class='font-semibold text-xl text-whiteblue border-transparent border-b-2 hover:border-whiteblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-whiteblue border-transparent border-b-2 hover:border-whiteblue transition-all' href='/feedback'>feedback</a>
                <button type='button' onclick="location.href='/login';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue transition-all'>
                    login
                </button>
            </div>
        </header>

        <div>
            <img
                src='{{ asset("img/Gravity Jump wallpaper.png") }}'
                alt='before-silence'
                class='object-none h-screen/2 w-full'
            />
        </div>

        <div class='h-screen-4/6 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <div class='flex justify-between flex-col lg:flex-row'>
                <h2 class='text-2xl lg:text-4xl md:text-4xl xl:text-6xl font-medium text-whiteblue mt-14'>Gravity Jump</h2>
                <button type='button' onclick="location.href='/register';" class='w-full lg:w-1/3 xl:w-1/6 mt-8 md:mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue transition-all'>
                    become tester
                </button>
            </div>
            <div class='w-full lg:w-2/5'>
                <p class='text-xl lg:text-2xl font-light text-whiteblue mt-8'>Gravity Jump is an endless runner mobile game with interesting obstacles and power ups, all controlled in single click.</p>
            </div>
        </div>

        <footer class='h-screen/4 xl:h-screen/3 bg-darkblue border border-whiteblue border-t-1 border-l-0 border-b-0 border-r-0 px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-10 flex flex-col justify-center items-center'>
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