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
        <header class='flex items-center justify-between px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-5 border-none bg-transparent'>
            <a href='/'>
                <img
                    src='{{ asset("img/nocta-logo.png") }}'
                    alt='Nocta Studio Logo'
                    width='100'
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

        <div class='h-screen/2 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <div class='flex justify-between'>
                <h2 class='text-6xl font-medium text-whiteblue mt-14'>Gravity Jump</h2>
                <button type='button' onclick="location.href='/register';" class='w-1/6 mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue transition-all'>
                    become tester
                </button>
            </div>
            <div class='w-2/5'>
                <p class='text-2xl font-light text-whiteblue mt-8'>Gravity Jump is an endless runner mobile game with interesting obstacles and power ups, all controlled in single click.</p>
            </div>
        </div>
    </body>
</html>