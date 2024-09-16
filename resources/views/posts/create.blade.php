<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <style>
        /* Agrega algunos estilos personalizados aquí si es necesario */
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="bg-white shadow-xl rounded-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-extrabold mb-6 text-red-600 text-center">Crear Nuevo Post</h1>

            <form action="/posts" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-600">Usuario</label>
                        <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3" readonly />
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-600">Título</label>
                        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3" placeholder="Título del Post" value="{{ old('title') }}" required />
                    </div>
                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-600">Contenido</label>
                    <textarea id="body" name="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3" placeholder="Contenido del Post" required>{{ old('body') }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-600">Categoría</label>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="image_url" class="block mb-2 text-sm font-medium text-gray-600">Imagen Principal</label>
                    <input type="file" id="image_url" name="image_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3" />
                </div>

                <div class="mb-6">
                    <label for="additional_images" class="block mb-2 text-sm font-medium text-gray-600">Imágenes Adicionales</label>
                    <input type="file" id="additional_images" name="additional_images[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-3" multiple />
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-red-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-150 ease-in-out">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

{{-- este esssssssssssss --}}
