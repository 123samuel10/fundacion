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
                            <a href="{{ route('posts.create') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 text-lg font-semibold">Crear Post</a>
                        </div>

                        <div class="overflow-x-auto">
                            <div class="min-w-full bg-white dark:bg-gray-900 shadow-md rounded-lg">
                                <table class="min-w-full bg-white dark:bg-gray-900 text-sm text-left">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="py-4 px-6 text-lg">#</th>
                                            <th class="py-4 px-6 text-lg">UserId</th>
                                            <th class="py-4 px-6 text-lg">Titleee</th>
                                            <th class="py-4 px-6 text-lg">Body</th>
                                            <th class="py-4 px-6 text-lg">Images</th>
                                            <th class="py-4 px-6 text-lg">Date</th>
                                            <th class="py-4 px-6 text-lg">Category</th>
                                            <th class="py-4 px-6 text-lg">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700 dark:text-gray-300">
                                        @foreach($posts as $post)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="py-4 px-6">{{ $post->id }}</td>
                                            <td class="py-4 px-6">{{ $post->user_id }}</td>
                                            <td class="py-4 px-6">{{ $post->title }}</td>
                                            <td class="py-4 px-6">{{ $post->body }}</td>

                                            <td class="py-4 px-6">
                                                @if(is_array($post->additional_images) || is_object($post->additional_images))
                                                    @foreach($post->additional_images as $image)
                                                        <img src="{{ asset('storage/' . $image) }}" width="100" class="rounded mb-2" alt="Imagen del post {{ $post->id }}">
                                                    @endforeach
                                                @else
                                                    No image
                                                @endif
                                            </td>

                                            <td class="py-4 px-6">{{ $post->date_time }}</td>
                                            <td class="py-4 px-6">{{ $post->category }}</td>
                                            <td class="py-4 px-6">
                                                <div class="flex flex-col sm:flex-row gap-2">
                                                    <x-edit-posts :post="$post" :categorias="$categorias" />
                                                    <button data-modal-target="popup-modal-{{ $post->id }}" data-modal-toggle="popup-modal-{{ $post->id }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg px-4 py-2 transition duration-300">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
