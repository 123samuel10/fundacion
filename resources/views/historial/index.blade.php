<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Publicaciones User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-6">
                        <div class="mb-4">
                            <a href="users/create" class="bg-red-500 text-white px-4 py-2 rounded">Crear Posts</a>
                        </div>
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">#</th>
                                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                        <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                        <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Body</th>
                                        <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                        <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($posts as $post)
                                    <tr class="border-b">
                                        <td class="py-3 px-4"></td>
                                        <td class="py-3 px-4">{{$post->id}}</td>
                                        <td class="py-3 px-4">{{$post->title}}</td>
                                        <td class="py-3 px-4">{{$post->body}}</td>
                                        <td class="py-3 px-4">{{$post->category}}</td>
                                        <td class="py-3 px-4">
                                            <button data-modal-target="popup-modal-{{ $post->id }}" data-modal-toggle="popup-modal-{{ $post->id }}" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                                                Borrar
                                            </button>
                                            <x-destroy-posts-historial :post="$post" />
                                            {{-- <form action="/historial/{{$post->id }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="text-red-500 hover:underline bg-transparent border-none cursor-pointer">
                                            </form> --}}
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
</x-app-layout>
