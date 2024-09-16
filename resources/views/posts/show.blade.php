<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Estilos personalizados para las imágenes */
        .main-image {
            width: 100%;
            object-fit: cover; /* Ajusta la imagen sin distorsionar */
            border-radius: 0.75rem; /* Bordes redondeados */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            margin-bottom: 1.5rem; /* Espaciado inferior */
        }
        .image-container {
            overflow-y: auto; /* Permite el desplazamiento vertical */
            max-height: 500px; /* Ajusta la altura máxima según tu diseño */
        }
        .additional-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Ajusta el número de columnas automáticamente */
            gap: 1rem; /* Espaciado entre imágenes */
        }
        .additional-images .image-container {
            position: relative;
            overflow-y: auto; /* Permite el desplazamiento vertical */
            max-height: 300px; /* Ajusta la altura máxima para las imágenes adicionales */
            border-radius: 0.5rem; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }
        .additional-images img {
            width: 100%;
            height: auto; /* Mantiene la relación de aspecto */
            display: block;
        }

        /* Estilos adicionales para pantallas grandes */
        @media (min-width: 768px) {
            .main-image {
                max-height: 600px; /* Tamaño máximo para la imagen principal en pantallas grandes */
            }
        }

        @media (min-width: 1024px) {
            .main-image {
                max-height: 700px; /* Tamaño máximo para la imagen principal en pantallas muy grandes */
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            <!-- Título del post -->
            <h1 class="text-3xl md:text-4xl font-bold mb-6 text-red-600 text-center">{{ $post->title }}</h1>

            <!-- Cuerpo del post -->
            <p class="text-base md:text-lg mb-6 text-gray-700">{{ $post->body }}</p>

            <!-- Imagen principal del post -->
            @if($post->image_url)
                <div class="image-container">
                    <img src="{{ asset('storage/' . $post->image_url) }}" class="main-image mx-auto" alt="Imagen del post {{ $post->id }}">
                </div>
            @endif

            <!-- Imágenes adicionales del post -->
            @if($post->additional_images)
                @php
                    $additionalImages = json_decode($post->additional_images, true);
                @endphp
                @if(count($additionalImages))
                    <div class="additional-images">
                        @foreach($additionalImages as $image)
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $image) }}" alt="Imagen adicional del post {{ $post->id }}">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-700 text-center mt-4">No hay imágenes adicionales.</p>
                @endif
            @endif

            <!-- Botón de regresar -->
            {{-- <a href="{{ route('posts.index') }}" class="block text-red-600 hover:text-red-800 hover:underline mt-6 text-center font-semibold">Regresar</a> --}}
        </div>
    </div>
</body>
</html>
