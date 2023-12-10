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

    <body class='bg-whiteblue h-screen bg-cover relative' style="background-image: url('{{ asset('img/pattern.png') }}');"'>
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
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/games'>games</a>
                <a class='font-semibold text-xl text-darkblue border-transparent border-b-2 hover:border-darkblue transition-all' href='/feedback'>feedback</a>
            </div>
        </header>

        
        <div class='mb-24 mt-36 px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-row justify-between'>
            <div class='w-full md:w-full lg:w-1/2'>
                <h2 class='text-3xl font-medium text-darkblue'>join <span class='text-lightred'>beta tester </span>for our game!</h2>
                <p class='text-2xl font-light text-darkblue mt-8'>we are currently a growing team, and your help will be much appreciated!</p>
                <p class='text-2xl font-light text-darkblue mt-8'>by joining beta testing, you could help to give us some helpful feedbacks, report existing bugs, or any suggestions of what you think would be great to see in the game.</p>
                <p class='text-2xl font-light text-darkblue mt-8'>all feedbacks data will be stored and we will consider them to improve our game!</p>
                <form class='mt-14' method="POST" action="{{ route('register') }}" id='register-form'>
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" :value="__('Email')" class='text-2xl font-medium text-darkblue'>email</label>
                        <input id="email" type="email" name="email" :value="old('email')" 
                            class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                            required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div class="mt-8">
                        <label for="username" :value="__('Username')" class='text-2xl font-medium text-darkblue'>username</label>
                        <input id="username" type="text" name="username" :value="old('name')"
                            class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                            required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Age -->
                    <div class="mt-8">
                        <label for="age" :value="__('Age')" class='text-2xl font-medium text-darkblue'>age</label>
                        <input id="age" type="text" name="age" :value="old('age')"
                            class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                            required autofocus autocomplete="age" />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-8">
                        <label for="password" :value="__('Password')" class='text-2xl font-medium text-darkblue'>password</label>

                        <input id="password" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-8">
                        <label for="password_confirmation" :value="__('Confirm Password')" class='text-2xl font-medium text-darkblue'>confirm password</label>

                        <input id="password_confirmation" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-8 space-x-5">
                        <a class="underline text-sm text-darkblue dark:text-darkblue hover:text-darkred dark:hover:text-darkred rounded-md focus:outline-none transition-all" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type='submit' form='register-form' value='Submit' class='max-w-xs w-40 mt-2 px-7 py-4 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
            <img
                src='{{ asset("img/Babado and Amelia.png") }}'
                alt='dog'
                width="100%"
                height="100%"
                class='hidden lg:w-96 lg:h-96 lg:mt-16 lg:flex xl:scale-150'
            />
        </div>

        <footer class='h-screen/4 xl:h-screen/3 bg-darkblue px-8 2xl:px-64 xl:px-56 lg:px-40 md:px-32 py-10 flex flex-col justify-center items-center'>
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
