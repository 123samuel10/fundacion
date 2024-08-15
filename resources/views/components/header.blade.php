<nav class="bg-red-600 shadow-lg text-white">
    <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto px-4 py-6">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">

            <span class="self-center text-3xl font-bold whitespace-nowrap">Fundación Genios</span>
        </a>
        <button data-collapse-toggle="navbar-fundacion" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-fundacion">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-white rounded-lg bg-red-600 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                    <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.index')" class="block py-2 px-3 hover:text-red-300">Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('noticias.index')" :active="request()->routeIs('noticias.index')" class="block py-2 px-3 hover:text-red-300">Noticias</x-nav-link>
                </li>
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
</nav>
