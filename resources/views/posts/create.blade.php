<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-4xl font-bold mb-8 text-red-600 text-center">Crear Nuevo Post</h1>

            <form action="/posts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="user_id" class="block mb-2 text-sm font-medium text-red-700">Usuario</label>
                        <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" readonly />
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-red-700">Título</label>
                        <input type="text" id="title" name="title" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Título del Post" value="{{ old('title') }}" required />
                    </div>
                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 text-sm font-medium text-red-700">Contenido</label>
                    <textarea id="body" name="body" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Contenido del Post" required>{{ old('body') }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="category" class="block mb-2 text-sm font-medium text-red-700">Categoría</label>
                    <select id="category" name="category" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="image_url" class="block mb-2 text-sm font-medium text-red-700">Imagen Principal</label>
                    <input type="file" id="image_url" name="image_url" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" />
                </div>

                <div class="mb-6">
                    <label for="images" class="block mb-2 text-sm font-medium text-red-700">Imágenes Adicionales</label>
                    <input type="file" id="images" name="images[]" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" multiple />
                </div>

                <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Guardar</button>
            </form>
        </div>
    </div>
</body>
</html>
