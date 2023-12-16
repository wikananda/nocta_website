<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class='scroll-smooth'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | Nocta Studio</title>
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

    <body class='bg-whiteblue bg-cover relative flex flex-col min-h-screen' style="background-image: url('{{ asset('img/pattern.png') }}');"'>
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
            </div>
        </header>

        <div class='h-screen mt-36 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-row justify-between'>
            <!-- Session Status -->
            <!-- <x-auth-session-status class="" :status="session('status')" /> -->
            <div class='w-full md:w-full lg:w-1/2'>
                <h2 class='text-3xl font-medium text-darkblue'>login to your account.</h2>
                <form class='mt-16' method="POST" action="{{ route('login') }}" id='login-form'>
                    @csrf

                    <!-- Email Address -->
                    <div class='w-full'>
                        <label for="email" :value="__('Email')" class='text-2xl font-medium text-darkblue'>email</label>
                        <input id="email" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" :value="__('Password')" class='text-2xl font-medium text-darkblue'>password</label>

                        <input id="password" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-xl font-medium text-darkblue">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-start mt-4 flex-row space-x-5">
                        <!-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-darkblue dark:text-darkblue hover:text-darkred dark:hover:text-darkred rounded-md focus:outline-none transition-all" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif -->
                        <button type='submit' form='login-form' value='Submit' class='max-w-xs w-40 mt-2 px-7 py-4 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue focus:outline-none focus:outline-8 transition-all'>
                            {{ __('log in') }}
                        </button>
                        <a class="underline text-sm text-darkblue dark:text-darkblue hover:text-darkred dark:hover:text-darkred focus:outline-none transition-all" href="{{ route('register') }}">
                            {{ __('don\'t have account?') }}
                        </a>

                        <!-- <div class='flex flex-col space-y-3 mt-10'>
                            <label for="password" class='text-2xl font-medium text-darkblue'>not registered yet?</label>
                            <button type='button' onclick="location.href='/register';" class='max-w-xs w-40 px-7 py-4 text-xl font-semibold text-greenblue border-greenblue border-2 bg-transparent hover:bg-darkblue hover:border-darkblue hover:text-lightred transition-all'>
                                register
                            </button>
                        </div> -->
 
                    </div>
                </form>
            </div>
            <img
                src='{{ asset("img/babado amelia reina.gif") }}'
                alt='dog'
                width="100%"
                height="100%"
                class='hidden lg:w-80 lg:h-56 lg:mt-16 lg:flex xl:scale-150'
            />
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