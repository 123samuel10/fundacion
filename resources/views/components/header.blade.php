{{--
<nav class="bg-red-600 shadow-lg text-white">
    <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-3xl font-bold whitespace-nowrap">Fundación Genios</span>
        </a>

        <!-- Mobile Menu Button -->
        <button data-collapse-toggle="navbar-fundacion" type="button" class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <!-- Navigation Links -->
        <div class="hidden md:flex md:items-center md:justify-between w-full">
            <!-- Left Links -->
            <ul class="font-medium flex flex-col md:flex-row md:space-x-8 md:mt-0 bg-red-600 md:bg-transparent md:border-0 p-4 md:p-0 mt-4 md:mt-0 rounded-lg md:rounded-none border border-white md:border-none">
                <li>
                    <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.index')" class="block py-2 px-3 hover:text-red-300">Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('noticias.index')" :active="request()->routeIs('noticias.index')" class="block py-2 px-3 hover:text-red-300">Noticias</x-nav-link>
                </li>
            </ul>

            <!-- Right Links (Authentication) -->
            <ul class="font-medium flex flex-col md:flex-row md:space-x-8 md:mt-0 bg-red-600 md:bg-transparent md:border-0 p-4 md:p-0 mt-4 md:mt-0 rounded-lg md:rounded-none border border-white md:border-none">
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="rounded-full px-4 py-2 bg-white text-red-700 border border-white transition hover:bg-red-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="rounded-full px-4 py-2 bg-white text-red-700 border border-white transition hover:bg-red-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="rounded-full px-4 py-2 bg-white text-red-700 border border-white transition hover:bg-red-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>

    <!-- Collapsible Menu for Mobile -->
    <div class="md:hidden">
        <div id="navbar-fundacion" class="hidden">
            <ul class="font-medium flex flex-col p-4 mt-4 border border-white rounded-lg bg-red-600">
                <li>
                    <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.index')" class="block py-2 px-3 hover:text-red-300">Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('noticias.index')" :active="request()->routeIs('noticias.index')" class="block py-2 px-3 hover:text-red-300">Noticias</x-nav-link>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="block py-2 px-3 hover:text-red-300">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 hover:text-red-300">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="block py-2 px-3 hover:text-red-300">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav> --}}



<nav class="bg-gray-800 shadow-md text-white">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3">
            <span class="text-3xl font-semibold">Fundación Genios</span>
        </a>

        <!-- Center Links -->
        <div class="hidden md:flex space-x-6">
            <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.index')" class="text-white hover:bg-gray-700 px-4 py-2 rounded transition">Home</x-nav-link>
            <x-nav-link :href="route('noticias.index')" :active="request()->routeIs('noticias.index')" class="text-white hover:bg-gray-700 px-4 py-2 rounded transition">Noticias</x-nav-link>
        </div>

        <!-- Right Links (Authentication) -->
        <div class="hidden md:flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-white text-gray-800 border border-gray-800 rounded-full px-4 py-2 transition hover:bg-gray-800 hover:text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-gray-800 border border-gray-800 rounded-full px-4 py-2 transition hover:bg-gray-800 hover:text-white">Inicio</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-white text-gray-800 border border-gray-800 rounded-full px-4 py-2 transition hover:bg-gray-800 hover:text-white">Registrar</a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <button data-collapse-toggle="navbar-fundacion" type="button" class="md:hidden p-2 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded-lg">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>

    <!-- Collapsible Menu for Mobile -->
    <div id="navbar-fundacion" class="md:hidden hidden bg-gray-800">
        <ul class="flex flex-col p-4">
            <li><x-nav-link :href="route('home.index')" :active="request()->routeIs('home.index')" class="block py-2 px-4 text-white hover:bg-gray-700 rounded">Home</x-nav-link></li>
            <li><x-nav-link :href="route('noticias.index')" :active="request()->routeIs('noticias.index')" class="block py-2 px-4 text-white hover:bg-gray-700 rounded">Noticias</x-nav-link></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}" class="block py-2 px-4 text-white hover:bg-gray-700 rounded">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="block py-2 px-4 text-white hover:bg-gray-700 rounded">Log in</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="block py-2 px-4 text-white hover:bg-gray-700 rounded">Register</a></li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>
</nav>
