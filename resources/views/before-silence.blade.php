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

    <body class='bg-darkblue flex flex-col min-h-screen'>
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
                <a class='font-semibold text-xl text-whiteblue border-transparent border-b-2 focus:outline-none focus:outline-4 focus:border-none hover:border-whiteblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-whiteblue border-transparent border-b-2 focus:outline-none focus:outline-4 focus:border-none hover:border-whiteblue transition-all' href='/feedback'>feedback</a>
                @if(Auth::check())
                    <div class='relative'>
                        @if(Auth::user()->profile_picture)
                            <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="rounded-full h-10 w-10 bg-shite hover:cursor-pointer" onclick="toggleDropdown()">
                        @else
                            <div class="rounded-full h-10 w-10 bg-whiteblue text-xl text-greenblue flex items-center justify-center hover:cursor-pointer" onclick="toggleDropdown()">
                                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                            </div>
                        @endif

                        <div id='dropdown' class="absolute right-0 mt-2 w-48 bg-white overflow-hidden shadow-xl z-10 hidden">
                            <a href='/profile' class='block px-4 py-2 text-xl font-normal text-darkblue hover:bg-greenblue hover:text-whiteblue'>profile</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-xl text-darkblue  hover:bg-greenblue hover:text-whiteblue">log out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <button type='button' onclick="location.href='/login';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue focus:outline-none focus:outline-8 transition-all'>
                        login
                    </button>
                @endif
                <script>
                    document.addEventListener('click', function(event) {
                        var dropdown = document.getElementById('dropdown');
                        if (event.target !== dropdown && !dropdown.contains(event.target)) {
                            dropdown.style.display = 'none';
                        }
                    });
                    function toggleDropdown() {
                        var dropdown = document.getElementById('dropdown');
                        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
                        event.stopPropagation();
                    }
                </script>
            </div>
        </header>

        @if(Session::has('success'))
        <div id='alert' class="bg-greenblue border border-darkblue text-white px-4 py-3 relative" role="alert">
            <span class="block sm:inline"> {{ Session::get('success') }} </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-white" onclick="closeAlert()" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        @elseif(Session::has('status'))
        <div id='alert' class="bg-white border border-greenblue text-darkblue px-4 py-3 relative" role="alert">
            <span class="block sm:inline"> {{ Session::get('status') }} </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-darkblue" onclick="closeAlert()" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        @endif
        <script>
            function closeAlert() {
                document.getElementById('alert').style.display = 'none';
            }
        </script>

        <div>
            <img
                src='{{ asset("img/Before Silence wallpaper.png") }}'
                alt='before-silence'
                class='object-none h-screen/2 w-full'
            />
             
        </div>

        <form action="{{ route('update.tester', ['gameId' => 1]) }}" method='POST' id='become-tester' class='w-full'>
            @csrf
            <input type='hidden' name='tester-game1' value='tester-game1'>
        </form>
        <div class='px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <div class='flex justify-between flex-col lg:flex-row'>
                <h2 class='text-2xl lg:text-4xl md:text-4xl xl:text-6xl font-medium text-whiteblue mt-14'>Before Silence</h2>
                @if(Auth::check())
                    @if(Auth::user()->select('tester-game1'))
                        <div class='flex flex-col lg:w-1/3 xl:w-1/6 justify-center'>
                            <a href="https://drive.google.com/file/d/1jmaNt-MLEFUWfBfu17TTueVWo7ucdc7F/view?usp=sharing" target="_blank" download>
                                <button type='button' class='w-full mt-8 md:mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue focus:outline-none focus:outline-8 transition-all'>
                                    download
                                </button>
                            </a>
                            <p class='text-whiteblue font-normal mt-2 text-center'>You are a tester!</p>
                        </div>
                    @else
                        <div class='flex flex-col lg:w-1/3 xl:w-1/6 justify-center'>
                            <button type='submit' form='become-tester' class='w-full mt-8 md:mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue focus:outline-none focus:outline-8 transition-all'>
                                become tester
                            </button>
                        </div>
                    @endif
                @else
                    <button type='button' onclick="location.href='/login';" class='w-full lg:w-1/3 xl:w-1/6 mt-8 md:mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-whiteblue hover:text-greenblue focus:outline-none focus:outline-8 transition-all'>
                        become tester
                    </button>
                @endif
            </div>
            <div class='w-full lg:w-2/5'>
                <p class='text-xl lg:text-2xl font-light text-whiteblue mt-8'>Before Silence is a retro pixel style RPG which implements turn based combat and rich narratives.</p>
                <p class='text-xl lg:text-2xl font-light text-whiteblue mt-8'>we believe rich and expressive character dialogue will lead to immersive story, and that is what we aim to achieve here.</p>
            </div>
        </div>

        <div class='py-16 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <div class='flex justify-center flex-col lg:justify-between lg:flex-row'>
                <img
                    src='{{ asset("img/babado amelia reina.gif") }}'
                    alt='babado'
                    class='mx-auto lg:mx-0 w-3/4 h-3/4 lg:w-1/2 lg:h-1/2'
                />
                <div class='w-full lg:w-2/5'>
                    <h2 class='text-2xl lg:text-4xl xl:text-6xl font-medium text-whiteblue mt-14'>story</h2>
                    <p class='text-xl lg:text-2xl font-light text-whiteblue mt-8'>Amelia, a little girl, got herself trapped in another dimension. The other world was full of strange, unfamiliar and spooky things.</p>
                    <p class='text-xl lg:text-2xl font-light text-whiteblue mt-8'>Luckily, a kind witch and a big mysterious creature named Reina and Babado took her in and willingly to help her. Now Amelia need to find out what actually happened, and if possible, find a way back home.</p>
                    <p class='text-xl lg:text-2xl font-light text-whiteblue mt-8'>Along the way, Amelia will encounter dangers and mystery, as well as many individuals. Some individuals are lenient, some are aggressive, some are quirky. </p>
                </div>
            </div>
        </div>

        <footer class='h-screen/4 xl:h-screen/3 bg-darkblue border border-whiteblue border-t-1 border-l-0 border-b-0 border-r-0 px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-10 flex flex-col justify-center items-center mt-auto'>
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