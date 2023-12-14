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

    {{-- darkblue, greenblue, whiteblue, lightred, darkred, transparent, white --}}
    
    <body class='bg-whiteblue bg-fill relative flex flex-col min-h-screen' style="background-image: url('{{ asset('img/pattern.png') }}');"'>
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

        @if(Session::has('status'))
        <div id='alert' class="bg-greenblue border border-darkblue text-white px-4 py-3 relative" role="alert">
            <span class="block sm:inline"> {{ Session::get('status') }} </span>
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

        
        <div class='mb-24 mt-36 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-row justify-between'>
            <div class='w-full flex flex-row justify-between'>
                @if(Auth::user()->profile_picture)
                    <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="rounded-full h-56 w-56 bg-shite hover:cursor-pointer" onclick="toggleDropdown()">
                @else
                    <div class="rounded-full h-56 w-56 bg-greenblue text-7xl text-whiteblue flex items-center justify-center hover:cursor-pointer" onclick="toggleDropdown()">
                        {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                    </div>
                @endif
                    
                <div class='w-2/3'>
                    <!-- Email Address -->
                    <h2 class='text-3xl font-medium text-darkblue'>Hello, <span class='text-lightred'>{{ $user->username }}</span></h2>
                    <form id='edit-form' action="{{ route('profile.update') }}" class='mt-10' method='POST'>
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="email" :value="__('Email')" class='text-2xl font-medium text-darkblue'>email</label>
                            <input id="email" type="email" name="email" value="{{ $user->email }}" 
                                class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-light text-darkblue bg-whiteblue"
                                required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div class="mt-8">
                            <label for="username" :value="__('Username')" class='text-2xl font-medium text-darkblue'>username</label>
                            <input id="username" type="text" name="username" value="{{ $user->username }}"
                                class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-light text-darkblue bg-whiteblue"
                                required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Age -->
                        <div class="mt-8">
                            <label for="age" :value="__('Age')" class='text-2xl font-medium text-darkblue'>age</label>
                            <input id="age" type="text" name="age" value="{{ $user->age }}"
                                class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-light text-darkblue bg-whiteblue"
                                required autofocus autocomplete="age" />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                        
                        <!-- Old Password -->
                        <div class="mt-8">
                            <label for="password_old" :value="__('Password')" class='text-2xl font-medium text-darkblue'>old password</label>

                            <input id="password_old" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                            type="password"
                                            name="password"
                                            autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- New Password -->
                        <div class="mt-8">
                            <label for="password_new" :value="__('Password')" class='text-2xl font-medium text-darkblue'>new password</label>

                            <input id="password_new" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                            type="password"
                                            name="password"
                                            autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-8">
                            <label for="password_confirmation" :value="__('Confirm Password')" class='text-2xl font-medium text-darkblue'>confirm new password</label>

                            <input id="password_confirmation" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                            type="password"
                                            name="password_confirmation" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <button type='submit' form='edit-form' value='save' class='mt-10 max-w-xs w-40 px-7 py-4 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                            {{ __('save') }}
                        </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class='min-h-screen w-full mb-24 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col'>
            <h2 class='text-4xl text-darkblue font-semibold'>
                feedback history
            </h2>
            <div class='w-full mb-24'>
                @foreach($feedbacks as $feedback)
                    <div class='mt-24 mb-5'>
                        <h2 class='font-semibold text-2xl text-darkblue'>{{ $feedback->title }}</h2>
                        <p class='font-light text-lg text-darkblue'>{{ $feedback->updated_at }}</p>
                        <p class='font-light text-xl text-darkblue'>type: <span class='font-medium'>{{ $feedback->type }}</span></p>
                        <p class='font-light text-xl text-darkblue'>game: <span class='font-medium'>{{ $feedback->game }}</span></p>
                        <p class='w-1/2 font-light text-xl text-darkblue mt-6'>{{ $feedback->feedback }}</p>
                    </div>
                    <div class='flex flex-col items-center'>
                        @foreach($replies as $reply)
                            @if($reply->feedback_id == $feedback->id)
                            <div class='mt-10 mb-5 w-1/2'>
                                <h2 class='font-semibold text-2xl text-darkblue'><span class='font-light text-lg'>reply from developer:</span> {{ $reply->title }}</h2>
                                <p class='font-light text-xl text-darkblue mt-6'>{{ $reply->reply }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
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
