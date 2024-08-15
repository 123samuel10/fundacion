<x-layout>
    <h1 class="text-4xl font-bold mb-8 text-center">Noticias</h1>

    <!-- Admin Posts Section -->
    <section class="mb-12">
        {{-- <h2 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Noticias del Admin</h2> --}}
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
    {{-- <section>
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Noticias del Usuario</h2>
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
    </section> --}}
</x-layout>
