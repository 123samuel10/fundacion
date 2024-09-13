<x-layout>
    <h1 class="text-4xl font-bold mb-8 text-center" style="font-family: 'Fredericka the Great', cursive;">Noticias</h1>

    <!-- Admin Posts Section -->
    <section class="mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($adminPosts as $post)
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
                <a href="{{ route('posts.show', $post->id) }}">
 {{-- Muestra la primera imagen del post --}}

                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" />
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

            <!-- Course Cards -->
            <x-course-card title="Curso de Programación" description="Enseña los fundamentos de la codificación, el desarrollo de software y la resolución de problemas a través de lenguajes de programación. Ideal para quienes desean crear aplicaciones, automatizar tareas o iniciar una carrera en tecnología." image="programacion1.jpeg" category="Programación" />

            <x-course-card title="Curso de Pensamiento Lógico" description="Enseña a desarrollar habilidades para razonar de manera estructurada y clara, resolver problemas complejos y tomar decisiones basadas en análisis lógico. Ideal para mejorar la capacidad de análisis crítico en diversas situaciones." image="pensamientoLogico.jpeg" category="Pensamiento Lógico" />

            {{-- <x-course-card title="Curso de Música" description="Ofrece conocimientos sobre teoría musical, práctica instrumental y composición. Ideal para desarrollar habilidades creativas y comprender el lenguaje de la música, tanto para principiantes como para músicos avanzados." image="musica1.jpeg" category="Música" /> --}}

            {{-- <x-course-card title="Fundación Genios" description="Horario: Sábados 3:00pm a 6:00pm" image="fundacion.jpeg" category="Fundación" /> --}}
        </div>
    </section>

    <!-- User Posts Section -->
    {{-- <section>
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Noticias del Usuario</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($userPosts as $post)
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
                <div class="p-5">
                    <a href="{{ route('posts.show', $post->id) }}">
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
