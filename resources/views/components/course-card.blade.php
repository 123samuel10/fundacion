<div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transition-transform transform hover:scale-105">
    <a href="#">
        <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white" style="font-family: 'Fredericka the Great', cursive;">{{ $title }}</h5>
        </a>
        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{{ $description }}</p>
        <p class="text-sm text-gray-500 dark:text-gray-300">Categoría: {{ $category }}</p>
    </div>
</div>
