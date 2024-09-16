<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel' }}</title>

    <!-- Importar la fuente Fredericka the Great y Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Color de fondo más claro */
            color: #212529; /* Color de texto más oscuro para mejor contraste */
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <x-header />

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <x-footer />

</body>
</html>
