<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Learningo</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
            <style>
      .gradient {
        background: linear-gradient(90deg, #000 100%, #FFF 0%);
      }
    </style>

        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>

    <body class="antialiased">
            <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
        <a class="toggleColour text-black no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <!--Icon from: http://www.potlabicons.com/ -->
            <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
            <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
            <path
                class="plane-take-off"
                d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
            />
            </svg>
            Learningo
        </a>
        </div>
        <div class="block lg:hidden pr-4">
        <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
            <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#home">Home</a>
            </li>
            <li class="mr-3">
            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#about">About</a>
            </li>
            <li class="mr-3">
            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#faq">FAQ</a>
            </li>
            <li class="mr-3">
            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#contact">Contact us</a>
            </li>
        </ul>

        @if (Route::has('login'))
                    @auth
                        <button onclick="window.location.href='{{ url('/dashboard') }}';" id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Dashboard</button>
                    @else
                        <button onclick="window.location.href='{{ route('login') }}';" id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Log in</button>

                        @if (Route::has('register'))
                            <button onclick="window.location.href='{{ route('register') }}';" id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Register</button>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>


    <div class="mx-10 mt-48">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <form method="POST" action="{{ route('contact.send') }}">
                        <x-jet-validation-errors class="mb-4" />
                        @csrf
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus placeholder="Name ..." autocomplete='off'/>
                        </div>
                        
                        <div class="mt-4">
                            <x-jet-label for="message" value="{{ __('Message') }}" />
                            <textarea
                            x-data="{ resize: () => { $el.style.height = '150px'; $el.style.height = $el.scrollHeight + 'px' }}"
                            x-init="resize()" @input="resize()"
                            x-on:keydown.enter="if (!$event.shiftKey) $wire.post()" placeholder="Message..."
                            class="bg-blueGray-100 max-h-58 w-full rounded-md  focus:outline-none focus:ring-0 resize-none overflow-hidden p-3 border-gray-300"
                            name="post"
                            id="message"
                            ></textarea>
                        </div>

                            
                        <div class="flex justify-between mt-10">
                            <x-jet-button class="mr-4">
                                {{ __('Post') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
