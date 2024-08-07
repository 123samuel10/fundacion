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
                                            {{-- @if(Auth::user()->usertype === 'admin') --}}
                                            <!-- Modal toggle -->

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
