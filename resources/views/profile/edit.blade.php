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
    
    <body class='bg-whiteblue h-screen bg-cover relative flex flex-col min-h-screen' style="background-image: url('{{ asset('img/pattern.png') }}');"'>
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
                    <h2 class='text-3xl font-medium text-darkblue'>Hello, <span class='text-lightred'>User</span></h2>
                    <form>
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
                        
                        <!-- Old Password -->
                        <div class="mt-8">
                            <label for="password_old" :value="__('Password')" class='text-2xl font-medium text-darkblue'>old password</label>

                            <input id="password_old" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- New Password -->
                        <div class="mt-8">
                            <label for="password_new" :value="__('Password')" class='text-2xl font-medium text-darkblue'>new password</label>

                            <input id="password_new" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-8">
                            <label for="password_confirmation" :value="__('Confirm Password')" class='text-2xl font-medium text-darkblue'>confirm new password</label>

                            <input id="password_confirmation" class="focus:ring-lightred block mt-1 w-full text-2xl border border-darkblue font-medium text-darkblue bg-whiteblue"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                            <button type='submit' form='edit-form' value='Edit' class='max-w-xs w-40 mt-2 px-7 py-4 text-xl font-semibold text-whiteblue border-transparent border-2 bg-greenblue hover:bg-whiteblue hover:border-greenblue hover:text-greenblue transition-all'>
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        

        <div class='min-h-screen px-16 2xl:px-64 xl:px-56 lg:px-40 md:px-32 flex flex-col'>
            {{-- <div class='w-full h-40 bg-darkblue px-5 py-5 flex items-end'>
                <h2 class='text-lightred text-3xl font-medium'>{{ ucwords(str_replace('-', ' ', $game)) }}</h2>
            </div> --}}
            <table class='table-auto mt-16 mb-16 text-left'>
                <thead class='font-semibold text-darkblue text-xl'>
                    <tr>
                        <th class='pb-5'>game</th>
                        <th class='pb-5'>feedback type</th>
                        <th class='pb-5'>title</th>
                    </tr>
                </thead>
                <tbody class='font-normal text-darkblue text-xl'>
                    {{-- @foreach($feedbacks as $feedback) --}}
                        <tr>
                            <td class='py-10 pr-2'></td>
                            <td class='py-10 pr-2'></td>
                            <td class='py-10 pr-2'></td>
                            <td class='text-right py-10 pr-2'>
                                <a href='' class='px-6 py-4 bg-greenblue text-whiteblue border-2 border-greenblue font-semibold hover:bg-whiteblue hover:text-greenblue transition-all focus:outline-none focus:outline-8'>view reply</a>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
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
