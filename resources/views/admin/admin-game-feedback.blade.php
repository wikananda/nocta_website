<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Feedback Admin</title>
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
                <button type='button' onclick="location.href='{{ route('admin.dashboard') }}';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                    dashboard
                </button>
                <button type='button' onclick="location.href='{{ route('admin.logout') }}';" class='px-7 py-3 text-xl font-semibold text-darkblue border-transparent border-2 bg-lightred hover:bg-whiteblue hover:border-lightred hover:text-lightred transition-all focus:outline-none focus:outline-8'>
                    logout
                </button>
            </div>
        </header>
        <div class='min-h-screen px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col'>
            <div class='w-full h-40 bg-darkblue px-5 py-5 flex items-end'>
                <h2 class='text-lightred text-3xl font-medium'>{{ ucwords(str_replace('-', ' ', $game)) }}</h2>
            </div>
            <table class='table-auto mt-16 mb-16 text-left'>
                <thead class='font-semibold text-darkblue text-xl'>
                    <tr>
                        <th class='pb-5'>game</th>
                        <th class='pb-5'>feedback type</th>
                        <th class='pb-5'>title</th>
                    </tr>
                </thead>
                <tbody class='font-normal text-darkblue text-xl'>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td class='py-10 pr-2'>{{ $feedback->game }}</td>
                            <td class='py-10 pr-2'>{{ $feedback->type }}</td>
                            <td class='py-10 pr-2'>{{ $feedback->title }}</td>
                            <td class='text-right py-10 pr-2'>
                                <a href='' class='px-6 py-4 bg-greenblue text-whiteblue border-2 border-greenblue font-semibold hover:bg-whiteblue hover:text-greenblue transition-all focus:outline-none focus:outline-8'>view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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