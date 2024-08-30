{{-- <x-layout>
    <h1 class="text-4xl font-bold mb-8 text-center" style="font-family: 'Fredericka the Great', cursive;">Publicaciones</h1> --}}

    <!-- Admin Posts Section -->
    {{-- <section class="mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($adminPosts as $post)
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
                    <a href="#"> --}}
                        {{-- Muestra todas las imágenes asociadas al post --}}
                        {{-- @if($post->images->count() > 0)

                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->images->first()->image_url) }}" alt="{{ $post->title }}" />
                        @else
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/default.jpg') }}" alt="Imagen predeterminada" />
                        @endif
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white" style="font-family: 'Fredericka the Great', cursive;">{{ $post->title }}</h5>
                        </a>
                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Categoría: {{ $post->categoria ? $post->categoria->name : 'Sin categoría' }}</p>
                    </div>
                </div> --}}
            {{-- @endforeach
        </div>
    </section>
</x-layout> --}}
<x-layout>
    <h1 class="text-4xl font-bold mb-8 text-center" style="font-family: 'Fredericka the Great', cursive;">Publicaciones</h1>

    <!-- Admin Posts Section -->
    <section class="mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($adminPosts as $post)
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
                    <a href="{{ route('posts.show', $post->id) }}">
                        {{-- Muestra la primera imagen del post --}}
                        @if($post->images->count() > 0)
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->images->first()->image_url) }}" alt="{{ $post->title }}" />
                        @else
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/default.jpg') }}" alt="Imagen predeterminada" />
                        @endif
                    </a>
                    <div class="p-5">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <h5 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white" style="font-family: 'Fredericka the Great', cursive;">{{ $post->title }}</h5>
                        </a>
                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Categoría: {{ $post->categoria ? $post->categoria->name : 'Sin categoría' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
