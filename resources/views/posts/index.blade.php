<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-6">
                        <div class="mb-4 flex justify-between items-center">
                            <a href="posts/create" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">Crear Posts</a>
                        </div>

                        <!-- Ajuste para pantallas pequeñas -->
                        <div class="overflow-x-auto">
                            <div class="min-w-full bg-white dark:bg-gray-900 shadow-md rounded my-6">
                                <table class="min-w-full bg-white dark:bg-gray-900 text-sm text-left">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">#</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">UserId</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Title</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Body</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Image</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Date</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Category</th>
                                            <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700 dark:text-gray-300">
                                        @foreach($posts as $post)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="py-2 px-2 sm:px-4">{{ $post->id }}</td>
                                            <td class="py-2 px-2 sm:px-4">{{ $post->user_id }}</td>
                                            <td class="py-2 px-2 sm:px-4">{{ $post->title }}</td>
                                            <td class="py-2 px-2 sm:px-4">{{ $post->body }}</td>
                                            <td class="py-2 px-2 sm:px-4">
                                                @if($post->image_url)
                                                <img src="{{ asset('storage/' . $post->image_url) }}" width="40" class="rounded-full">
                                                @endif
                                            </td>
                                            <td class="py-2 px-2 sm:px-4">{{ $post->date_time }}</td>
                                            <td class="py-2 px-2 sm:px-4">{{ $post->category }}</td>
                                            <td class="py-2 px-2 sm:px-4">
                                                <div class="flex flex-col sm:flex-row gap-2">
                                                    <x-edit-posts :post="$post" :categorias="$categorias" />
                                                    <button data-modal-target="popup-modal-{{ $post->id }}" data-modal-toggle="popup-modal-{{ $post->id }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs sm:text-sm px-2 py-1 sm:px-5 sm:py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transition duration-300">
                                                        Borrar
                                                    </button>
                                                    <x-destroy-posts :post="$post" />
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Fin del ajuste -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
