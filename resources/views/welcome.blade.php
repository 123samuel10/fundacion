<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

    <!-- Header -->
    <header class="bg-red-600 shadow-lg text-white">
        <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">Fundación Genios</h1>
            <nav class="space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-full px-4 py-2 bg-white text-red-700 border border-white transition hover:bg-red-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full px-4 py-2 bg-white text-red-700 border border-white transition hover:bg-red-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-full px-4 py-2 bg-white text-red-700 border border-white transition hover:bg-red-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold mb-8 text-center">Publicaciones</h1>

                    <!-- Admin Posts Section -->
                    <section class="mb-12">
                        <h2 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Publicaciones del Admin</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($adminPosts as $post)
                            <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
                                <a href="#">
                                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h5>
                                    </a>
                                    <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-300">Categoría: {{ $post->categoria ? $post->categoria->name : 'Sin categoría' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- User Posts Section -->
                    <section>
                        <h2 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Publicaciones del Usuario</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($userPosts as $post)
                            <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h5>
                                    </a>
                                    <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-300">Categoría: {{ $post->categoria ? $post->categoria->name : 'Sin categoría' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

  <!-- Footer -->
  <footer class="bg-red-600 text-gray-400 py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-between items-start space-y-6">
        <div class="w-full sm:w-1/3">
            <h3 class="text-lg font-semibold text-white">Sobre nosotros</h3>
            <p class="mt-2">Somos una fundación comprometida con el desarrollo y bienestar de nuestra comunidad.</p>
        </div>
        <div class="w-full sm:w-1/3">
            <h3 class="text-lg font-semibold text-white">Contacto</h3>
            <ul class="mt-2">
                <li>Email: admin@geniossoft.com</li>
                <li>Celular: 320 680-5180</li>
                <li>Dirección: Calle 1 Norte # 16-69, Armenia-Quindio</li>
            </ul>
        </div>
        <div class="w-full sm:w-1/3">
            <h3 class="text-lg font-semibold text-white">Redes Sociales</h3>
            <div class="mt-2 flex space-x-4">
                <a href="https://www.facebook.com/geniosfundacion?mibextid=LQQJ4d" class="hover:text-white transition-colors">Facebook</a>
                <a href="#" class="hover:text-white transition-colors">Twitter</a>
                <a href="#" class="hover:text-white transition-colors">Instagram</a>
            </div>
        </div>
    </div>
    <div class="text-center mt-8">
        <p class="text-sm">© 2024 Fundación Genios.</p>
    </div>
</footer>

    <!-- Scripts -->

</body>
</html>
