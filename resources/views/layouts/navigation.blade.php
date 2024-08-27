<nav x-data="{ open: false }" class="bg-red-600 border-b border-red-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-8 sm:-my-px sm:ml-10">
                    @if(Auth::user()->usertype === 'user')
                        <!-- User Link -->
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="text-white hover:text-red-300">
                            Publicar
                        </x-nav-link>
                    @elseif(Auth::user()->usertype === 'admin')
                        <!-- Links for Admins -->
                        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="text-white hover:text-red-300">
                            Publicaciones
                        </x-nav-link>

                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" class="text-white hover:text-red-300">
                            Categorías
                        </x-nav-link>
{{--
                        <x-nav-link :href="route('historial.index')" :active="request()->routeIs('historial.index')" class="text-white hover:text-red-300">
                            Historial
                        </x-nav-link> --}}
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:text-red-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-red-600 hover:bg-red-100">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 hover:bg-red-100">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <button @click="open = ! open" class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300" aria-controls="navbar-fundacion" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Hidden on large screens) -->
    <div id="navbar-fundacion" :class="{'block': open, 'hidden': ! open}" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-red-600 border-t border-red-700">
            @if(Auth::user()->usertype === 'user')
                <a href="{{ route('users.index') }}" class="text-white hover:bg-red-700 block px-3 py-2 rounded-md text-base font-medium">Publicar</a>
            @elseif(Auth::user()->usertype === 'admin')
                <a href="{{ route('posts.index') }}" class="text-white hover:bg-red-700 block px-3 py-2 rounded-md text-base font-medium">Publicaciones</a>
                <a href="{{ route('categories.index') }}" class="text-white hover:bg-red-700 block px-3 py-2 rounded-md text-base font-medium">Categorías</a>
                {{-- <a href="{{ route('historial.index') }}" class="text-white hover:bg-red-700 block px-3 py-2 rounded-md text-base font-medium">Historial</a> --}}
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-red-700 bg-red-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="text-red-600 hover:bg-red-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    {{ __('Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 hover:bg-red-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
