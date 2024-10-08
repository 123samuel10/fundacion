<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categorías
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-6">
                        <div class="mb-4 flex justify-between items-center">
                            <a href="categories/create" class="bg-red-500 text-white px-4 py-2 rounded">Crear Categoría</a>

                            <!-- Botón para alternar entre modos -->
                            <button id="mode-toggle" class="bg-gray-800 text-white px-4 py-2 rounded-lg">
                                Alternar Modo Oscuro
                            </button>
                        </div>

                        <div class="bg-white dark:bg-gray-900 shadow-md rounded my-6">
                            <table class="min-w-full bg-white dark:bg-gray-900">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">#</th>
                                        <th class="w-8/12 py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                                        <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Imagen</th>
                                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 dark:text-gray-300">
                                    @foreach($categorias as $categoria)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="py-3 px-4">{{ $categoria->id }}</td>
                                        <td class="py-3 px-4">{{ $categoria->name }}</td>
                                        <td class="py-3 px-4">
                                            @if($categoria->image_url)
                                                <img src="{{ asset('storage/' . $categoria->image_url) }}" alt="{{ $categoria->name }}" class="w-32 h-32 object-cover">
                                            @else
                                                Sin imagen
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">
                                            <form action="/categories/{{ $categoria->id }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById('mode-toggle');

            // Verificar la preferencia guardada en localStorage
            const currentMode = localStorage.getItem('mode') || 'light';
            document.body.classList.toggle('dark', currentMode === 'dark');

            toggleButton.addEventListener('click', function() {
                // Alternar el modo
                const newMode = document.body.classList.toggle('dark') ? 'dark' : 'light';
                localStorage.setItem('mode', newMode);
                toggleButton.textContent = newMode === 'dark' ? 'Alternar Modo Claro' : 'Alternar Modo Oscuro';
            });

            // Establecer el texto del botón según el modo actual
            toggleButton.textContent = currentMode === 'dark' ? 'Alternar Modo Claro' : 'Alternar Modo Oscuro';
        });
    </script>
</x-app-layout>
