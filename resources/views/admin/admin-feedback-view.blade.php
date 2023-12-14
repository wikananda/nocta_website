<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Feedback Admin - {{ ucwords(str_replace('-', ' ', $game)) }}</title>
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
                <button type='button' onclick="location.href='{{ route('admin.logout') }}';" class='px-7 py-3 text-xl font-semibold text-darkblue border-transparent border-2 bg-lightred hover:bg-whiteblue hover:border-lightred hover:text-lightred transition-all'>
                    logout
                </button>
            </div>
        </header>

        @if(Session::has('success'))
        <div id='alert' class="bg-greenblue border border-darkblue text-white px-4 py-3 relative" role="alert">
            <span class="block sm:inline"> {{ Session::get('success') }} </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-white" onclick="closeAlert()" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        @endif
        <script>
            function closeAlert() {
                document.getElementById('alert').style.display = 'none';
            }
        </script>

        <div class='min-h-screen px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col mb-32'>
            <button type="button" onclick="locataion.href='{{ route('admin.game-feedback', ['game' => 'Before Silence']) }}';" class="max-w-xs w-16 mt-14 text-xl flex items-center justify-start text-darkred transition-all font-medium duration-200 bg-transparent gap-x-2 border-transparent border-b-2 hover:text-lightred hover:border-lightred focus:outline-non focus:outline-8">
                <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>
                <span>back</span>
            </button>
            <div class='flex flex-row mt-5'>
                <div class='flex flex-col mt-6 w-9/12 space-y-14'>
                    <div>
                        <h2 class='text-2xl font-semibold text-darkblue'>game</h2>
                        <p class='text-2xl font-light text-darkblue mt-5'>{{ $feedback->game }}</p>
                    </div>
                    <div>
                        <h2 class='text-2xl font-semibold text-darkblue'>feedback type</h2>
                        <p class='text-2xl font-light text-darkblue mt-5'>{{ $feedback->type }}</p>
                    </div>
                </div>
                <div class='flex flex-col mt-6 w-9/12 space-y-14'>
                    <div>
                        <h2 class='text-2xl font-semibold text-darkblue'>username</h2>
                        <p class='text-2xl font-light text-darkblue mt-5'>{{ $user->username }}</p>
                    </div>
                    <div>
                        <h2 class='text-2xl font-semibold text-darkblue'>email</h2>
                        <p class='text-2xl font-light text-darkblue mt-5'>{{ $user->email }}</p>
                    </div>
                </div>
                <div class='flex flex-col mt-6 w-9/12 space-y-14'>
                    <div>
                        <h2 class='text-2xl font-semibold text-darkblue'>age</h2>
                        <p class='text-2xl font-light text-darkblue mt-5'>{{ $user->age }}</p>
                    </div>
                </div>
            </div>
            <div class='mt-14'>
                <h2 class='text-2xl font-semibold text-darkblue'>title</h2>
                <p class='text-2xl font-normal text-darkblue mt-5'>{{ $feedback->title }}</p>
            </div>
            <div class='mt-14'>
                <h2 class='text-2xl font-semibold text-darkblue'>feedbacks</h2>
                <p class='text-2xl font-light text-darkblue mt-5 w-2/3'>{{ $feedback->feedback }}</p>
            </div>

            <div class='max-w-5xl'>
                <form action="{{ route('feedback.reply', $feedback->id) }}" method='POST' id='reply-form'>
                    @csrf
                    <div class='mt-14'>
                        <label class='text-2xl font-semibold text-darkblue' for="title">reply title</label>
                        <input type="text" id='title' name='title' class='bg-whiteblue w-full focus:ring-lightred font-medium text-darkblue text-2xl mt-3 border border-greenblue focus:transition-opacity' required>
                    </div>

                    <div class='mt-14'>
                        <label class='text-2xl font-semibold text-darkblue' for="reply">your reply</label>
                        <textarea cols="70" rows="15" type="text" id='reply' name='reply' class='bg-whiteblue w-full focus:ring-lightred font-medium text-darkblue text-2xl mt-3 border border-greenblue focus:transition-opacity' required></textarea>
                    </div>
                </form>
            </div>

            <div class='flex flex-row justify-between max-w-5xl mt-14'>
                <button type='submit' form='reply-form' class='px-7 py-3 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                    reply
                </button>
                <button type='button' onclick="" class='px-7 py-3 text-xl font-semibold text-darkblue border-transparent border-2 bg-lightred hover:bg-whiteblue hover:border-lightred hover:text-lightred transition-all'>
                    close
                </button>
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