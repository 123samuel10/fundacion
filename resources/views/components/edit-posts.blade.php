<!-- Botón para abrir el modal -->
<button data-modal-target="crud-modal-{{ $post->id }}" data-modal-toggle="crud-modal-{{ $post->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Editar Post
</button>

<!-- Modal principal -->
<div id="crud-modal-{{ $post->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
    <div class="relative w-full max-w-4xl mx-auto bg-white dark:bg-gray-700 rounded-lg shadow-lg">
        <!-- Encabezado del modal -->
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Editar Post
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $post->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Cerrar modal</span>
            </button>
        </div>

        <!-- Cuerpo del modal con scroll si es necesario -->
        <div class="p-4 overflow-y-auto" style="max-height: calc(100vh - 200px);">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2">
                    <div>
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar Usuario:</label>
                        <input type="text" name="user_id" id="user_id" value="{{ old('user_id', $post->user_id) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar Título:</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar Cuerpo:</label>
                        <textarea name="body" id="body" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('body', $post->body) }}</textarea>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar Categoría:</label>
                        <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $post->category_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        {{-- ESTA ES LA IMAGEN DE NOTICAS --}}
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar Imagen Principal:</label>
                        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @if($post->image_url)
                            <img src="{{ asset('storage/' . $post->image_url) }}" class="mt-2 w-32 h-32 object-cover rounded-lg" alt="Imagen principal del post">
                        @endif
                    </div>
                    <div>
                        <label for="images" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar Imágenes Adicionales:</label>
                        <input type="file" name="images[]" id="images" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($post->images as $image)
                                <img src="{{ asset('storage/' . $image->image_url) }}" class="w-32 h-32 object-cover rounded-lg" alt="Imagen adicional del post">
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Pie del modal, siempre visible -->
                <div class="flex items-center justify-end p-4 border-t dark:border-gray-600">
                    <button type="button" data-modal-toggle="crud-modal-{{ $post->id }}" class="text-gray-500 bg-transparent hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-lg px-4 py-2.5 dark:bg-gray-600 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white dark:focus:ring-gray-600">
                        Cancelar
                    </button>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- correcto --}}
