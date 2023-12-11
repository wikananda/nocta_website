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

    <body class='bg-whiteblue bg-cover flex flex-col min-h-screen' style="background-image: url('{{ asset('img/pattern.png') }}');">
        <header class='flex items-center justify-between px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-5 border-greenblue border-b bg-whiteblue'>
            <a href='/'>
                <img
                    src='{{ asset("img/nocta-logo darkblue.png") }}'
                    alt='Nocta Studio Logo'
                    width='100'
                    class='xl:scale-100 scale-75'
                />
            </a>

            <div class='hidden md:flex items-center lg:space-x-16 md:space-x-6'>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/feedback'>feedback</a>
                @if(Auth::check())
                    <div class='relative'>
                        @if(Auth::user()->profile_picture)
                            <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="rounded-full h-10 w-10 bg-shite hover:cursor-pointer" onclick="toggleDropdown()">
                        @else
                            <div class="rounded-full h-10 w-10 bg-greenblue text-xl text-whiteblue flex items-center justify-center hover:cursor-pointer" onclick="toggleDropdown()">
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
                    <button type='button' onclick="location.href='/login';" class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
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

        <div class='mt-36 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <div class='w-full md:w-3/5 lg:w-1/2'>
                <h2 class='text-3xl font-medium text-darkblue'>provide <span class='text-lightred'>feedback</span></h2>
                <p class='text-2xl font-light text-darkblue mt-8'>we would love to hear your thoughts about our game!</p>
                @if(Auth::check())
                    <form class='mt-14' action="" id='feedback-form'>
                        <div>
                            <label class='block font-medium text-2xl text-darkblue' for="game">game</label>
                            <select class='bg-whiteblue w-full focus:ring-lightred font-medium text-darkblue text-2xl mt-3 border border-greenblue' name='game' id='game'>
                                <option value="before-silence">Before Silence</option>
                                <option value="gravity-jump">Gravity Jump</option>
                            </select>
                        </div>
                        <div class='mt-8'>
                            <label class='block font-medium text-2xl text-darkblue' for="type">feedback type</label>
                            <select class='bg-whiteblue focus:ring-lightred font-medium text-darkblue w-full text-2xl mt-3 border border-greenblue' name='type' id='type'>
                                <option value="bug-reports">Bug Reports</option>
                                <option value="suggestion">Suggestions</option>
                            </select>
                        </div>
                        <div class='mt-8'>
                            <label class='block font-medium text-2xl text-darkblue' for="title">title</label>
                            <input class='bg-whiteblue w-full focus:ring-lightred font-medium text-darkblue text-2xl mt-3 border border-greenblue focus:transition-opacity' type="text" id='title' required>
                        </div>
                        <div class='mt-8'>
                            <label class='block font-medium text-2xl text-darkblue' for="feedback">your feedback</label>
                            <textarea class='bg-whiteblue w-full focus:ring-lightred font-medium text-darkblue text-2xl mt-3 border border-greenblue' name="feedback" id="feedback" cols="70" rows="15" required></textarea>
                        </div>

                        <button type='submit' form='feedback-form' value='Submit' class='mt-8 mb-20 px-7 py-4 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                            submit
                        </button>
                    </form>
                @else
                    <p class='text-2xl font-normal text-darkblue mt-8'>please <a href='/login' class='font-semibold text-lightred hover:underline focus:no-underline focus:outline-none transition-all'>login</a> to provide feedback</p>
                @endif
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