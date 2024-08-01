<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header class="flex justify-end py-10 space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-4 py-2 bg-white text-red-600 border border-red-600 transition hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-4 py-2 bg-white text-red-600 border border-red-600 transition hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-4 py-2 bg-white text-red-600 border border-red-600 transition hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </header>

                    <!-- Imagen Principal -->
                    <div class="mb-6">
                        <img src="http://localhost/laravel/crud/imagenes/fundacion.jpg" alt="Fundacion Image" class="w-full h-auto rounded shadow-lg">
                    </div>

                    <!-- Contenido Principal -->
                    <div class="text-lg text-red-600 mb-4">
                        This is the main content area. Add your content here.
                    </div>

                    <div class="text-red-800">
                        This is the footer of the article. Add additional information here.
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-red-600 p-6 text-white mt-8">
        <div class="mx-auto max-w-7xl flex justify-between">
            <div>
                <h3 class="text-lg font-semibold">Sobre nosotros</h3>
                <p class="mt-2">Somos una fundación trabajadora.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Contacto</h3>
                <ul class="mt-2">
                    <li>Email: admin@geniossoft.com</li>
                    <li>Celular: 320 680-5180</li>
                    <li>Dirección: Calle 1 Norte # 16-69, Armenia-Quindio</li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Redes Sociales</h3>
                <div class="mt-2 flex space-x-4">
                    <a href="#" class="hover:text-red-300">Facebook</a>
                    <a href="#" class="hover:text-red-300">Twitter</a>
                    <a href="#" class="hover:text-red-300">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
