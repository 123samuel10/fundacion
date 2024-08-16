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
                            <table class="min-w-full bg-white text-sm">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        {{-- <th class="py-2 px-2 uppercase font-semibold">#</th> --}}
                                        <th class="py-2 px-2 uppercase font-semibold">ID</th>
                                        <th class="py-2 px-2 uppercase font-semibold">Title</th>
                                        <th class="py-2 px-2 uppercase font-semibold">Body</th>
                                        <th class="py-2 px-2 uppercase font-semibold">Category</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($posts as $post)
                                    <tr class="border-b">

                                        <td class="py-2 px-2">{{$post->id}}</td>
                                        <td class="py-2 px-2">{{$post->title}}</td>
                                        <td class="py-2 px-2">{{$post->body}}</td>
                                        <td class="py-2 px-2">{{$post->category}}</td>
                                        <td class="py-2 px-2">

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
