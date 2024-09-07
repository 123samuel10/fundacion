<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-6 text-red-600 text-center">{{ $post->title }}</h1>
            <p class="text-base md:text-lg mb-6 text-gray-700">{{ $post->body }}</p>

            <!-- Mostrar la imagen principal del post -->
            @if($post->image_url)
                <img src="{{ asset('storage/' . $post->image_url) }}" class="w-full max-w-xs h-48 mx-auto mb-6 rounded-lg shadow-md object-cover" alt="Imagen del post {{ $post->id }}">
            @endif

            <!-- Mostrar las imágenes adicionales asociadas al post -->
            @if(count($post->additional_images))
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($post->additional_images as $imageUrl)
                        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('storage/' . $imageUrl) }}" class="w-full h-48 object-cover" alt="Imagen adicional del post {{ $post->id }}">
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- <a href="{{ route('posts.index') }}" class="block text-red-600 hover:text-red-800 hover:underline mt-6 text-center font-semibold">Regresar</a> --}}
        </div>
    </div>
</body>
</html>
