<?php
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nocta Studio | Indie Game Studio</title>
        @vite('resources/css/app.css')

        <script src="{{ asset('js/audioplayer.js') }}"></script>

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

    <body class='bg-whiteblue flex flex-col min-h-screen'>
        <header class='flex items-center justify-between px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-5 border-greenblue border-b z-10'>
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

        <div class='h-screen bg-cover relative' style="background-image: url('{{ asset('img/pattern.png') }}');">
            <h1 class='z-10 text-3xl md:text-6xl xl:text-8xl font-medium absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-darkblue'>no<span class='font-alternates text-2xl md:text-5xl xl:text-7xl font-bold'>c</span>ta <span class='font-alternates font-light'>studio</span></h1>
            <div class='absolute top-0 left-0 w-full h-full flex justify-center items-center z-0'>
                <img
                    src='{{ asset("img/Reina.png") }}'
                    alt='reina'
                    width='50%'
                    class='absolute bottom-40 left-0 md:bottom-48 lg:bottom-64 lg:left-24 xl:w-1/3 xl:bottom-0 xl:left-72'
                />
                <img
                    src='{{ asset("img/Babado and Amelia.png") }}'
                    alt='babado'
                    width='55%'
                    class='absolute top-32 right-0 md:top-24 lg:top-40 lg:right-0 xl:w-1/3 xl:top-0 xl:right-48'
                />
            </div>
        </div>
        <div class='flex flex-col justify-center px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32'>
            <p class='mt-32 text-4xl font-normal text-darkblue'>we are <span class='text-4xl font-normal'>independent video game studio</span> <br> based in Bali, Indonesia</p>
        </div>

        <div class='w-full'>
            <img
                src='{{ asset("img/before silence.gif") }}'
                alt='amelia'
                width='100%'
                class='mt-52 z-0'
            />
            <div class='px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 relative bottom-5 md:bottom-8 lg:bottom-10 xl:bottom-14 z-10'>
                <img
                    src='{{ asset("img/before silence logo.png") }}'
                    alt='before-silence-logo'
                    class='h-1/4 w-1/4'    
                />
            </div>
        </div>

        <div class="audio-player px-16 mt-10 2xl:px-64 xl:px-56 lg:px-40 md:px-32 h-screen flex flex-row items-center justify-between">
            <div class='w-1/2'>
                <h2 class='text-4xl text-darkblue font-semibold'>soundtracks.</h2>
                <div class='mt-10 audio-container'>
                    <audio id="audio" class='audio'>
                        <source src="{{ asset('music/Menu Theme.mp3') }}" type="audio/mpeg">
                    </audio>
                    <div class="controls bg-white shadow-md px-5 py-5">
                        <div><h2 class='text-2xl text-darkblue font-medium'>Menu Theme</h2></div>
                        <!-- <div id="play-pause-button" class="play mt-2"></div> -->
                        <div class='flex flex-row items-center space-x-10'>
                            <input id="seek-slider" class="seek-slider slider mt-2 w-full" type="range" min="0" step="1">
                            <div id='play-pause-button' class='play-pause-button play cursor-pointer shadow-lg bg-greenblue text-whiteblue w-16 h-14 rounded-full flex justify-center items-center'></div>
                        </div>
                        <div id="current-time" class='current-time text-darkblue font-light'>0:00</div>
                    </div>
                </div>
                <div class='mt-10 audio-container'>
                    <audio id="audio" class='audio'>
                        <source src="{{ asset('music/Reina Hut.mp3') }}" type="audio/mpeg">
                    </audio>
                    <div class="controls bg-white shadow-md px-5 py-5">
                        <div><h2 class='text-2xl text-darkblue font-medium'>Reina's Hut</h2></div>
                        <!-- <div id="play-pause-button" class="play mt-2"></div> -->
                        <div class='flex flex-row items-center space-x-10'>
                            <input id="seek-slider" class="seek-slider slider mt-2 w-full" type="range" min="0" step="1">
                            <div id='play-pause-button' class='play-pause-button play cursor-pointer shadow-lg bg-greenblue text-whiteblue w-16 h-14 rounded-full flex justify-center items-center'></div>
                        </div>
                        <div id="current-time" class='current-time text-darkblue font-light'>0:00</div>
                    </div>
                </div>
                <div class='mt-10 audio-container'>
                    <audio id="audio" class='audio'>
                        <source src="{{ asset('music/Mountain Forest Path.mp3') }}" type="audio/mpeg">
                    </audio>
                    <div class="controls bg-white shadow-md px-5 py-5">
                        <div><h2 class='text-2xl text-darkblue font-medium'>Mountain Forest Path</h2></div>
                        <!-- <div id="play-pause-button" class="play mt-2"></div> -->
                        <div class='flex flex-row items-center space-x-10'>
                            <input id="seek-slider" class="seek-slider slider mt-2 w-full" type="range" min="0" step="1">
                            <div id='play-pause-button' class='play-pause-button play cursor-pointer shadow-lg bg-greenblue text-whiteblue w-16 h-14 rounded-full flex justify-center items-center'></div>
                        </div>
                        <div id="current-time" class='current-time text-darkblue font-light'>0:00</div>
                    </div>
                </div>
            </div>

            <img
                src='{{ asset("img/babado amelia reina.gif") }}'
                alt='dog'
                width="100%"
                height="100%"
                class='hidden lg:w-80 lg:h-56 lg:mt-16 lg:flex xl:scale-150'
            />

        </div>

        <!-- <script>
            var audioContainers = document.getElementsByClassName('audio-container');
            console.log('audio count: ', audioContainers.length)
            for (let i = 0; i < audioContainers.length; i++) {
                let audio = audioContainers[i].getElementsByClassName('audio')[0];
                let playPauseButton = audioContainers[i].getElementsByClassName('play-pause-button')[0];
                let seekSlider = audioContainers[i].getElementsByClassName('seek-slider')[0];
                let currentTime = audioContainers[i].getElementsByClassName('current-time')[0];

                if (audio && playPauseButton && seekSlider && currentTime) {
                    playPauseButton.addEventListener('click', function() {
                        if (audio.paused) {
                            audio.play();
                            playPauseButton.classList.remove('play');
                            playPauseButton.classList.add('pause');
                        } else {
                            audio.pause();
                            playPauseButton.classList.remove('pause');
                            playPauseButton.classList.add('play');
                        }
                    });

                    audio.addEventListener('loadedmetadata', function(){
                        seekSlider.max = audio.duration;
                        seekSlider.value = 0;
                    });

                    audio.addEventListener('timeupdate', function() {
                        seekSlider.value = audio.currentTime;
                        currentTime.textContent = formatTime(audio.currentTime);
                    });

                    seekSlider.addEventListener('input', function() {
                        try {
                            audio.currentTime = seekSlider.value;
                        } catch (e) {
                            console.log('Failed to set audio currentTime: ', e);
                        }
                    });

                    seekSlider.addEventListener('mousedown', function() {
                        audio.pause();
                    });

                    seekSlider.addEventListener('mouseup', function() {
                        audio.play();
                    });
                } else {
                    console.log('One or more elements not found');
                }
            }

            function formatTime(seconds) {
                var minutes = Math.floor(seconds / 60);
                seconds = Math.floor(seconds % 60);
                return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
            }
        </script> -->

        <div class='px-16 mt-10 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col'>
            <h2 class='text-3xl font-medium text-darkblue'>we are a growing team, and we need your help</h2>
            <p class='text-2xl font-light text-darkblue mt-5'>we are currently developing two games, <br> we would really appreciate if you could test and provide feedbacks for us.</p>
            <div class='mt-10 flex md:flex-row md:space-x-16 flex-col space-y-16 md:space-y-0'>
                <figure class="max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 hover:scale-105">
                    <a href="/before-silence">
                        <img class="rounded-none shadow dark:rounded-none dark:bg-gray-800 dark:border-gray-700" src="{{ asset('img/Before Silence Banner.png') }}" alt="before-silence">
                    </a>
                    <p class='text-2xl font-medium text-darkblue mt-2'>Before Silence</p>
                </figure>
                <figure class="max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 hover:scale-105">
                    <a href="/gravity-jump">
                        <img class="rounded-none shadow dark:rounded-none dark:bg-gray-800 dark:border-gray-700" src="{{ asset('img/Gravity Jump Banner.png') }}" alt="gravity-jump">
                    </a>
                    <p class='text-2xl font-medium text-darkblue mt-2'>Gravity Jump</p>
                </figure>
            </div>
            <button type='button' onclick="location.href='/register';" class='w-full md:w-1/2 lg:w-1/4 xl:w-1/6 mt-14 px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                become tester
            </button>
            <div class='h-32'>
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