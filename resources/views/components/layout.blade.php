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
            transition: background-color 0.3s, color 0.3s;
        }
        .dark {
            background-color: #1a202c; /* Fondo oscuro */
            color: #f7fafc; /* Texto claro */
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <x-header />

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-start mb-4">
                <button id="mode-toggle" class="bg-gray-800 text-white px-4 py-2 rounded-lg">
                    Alternar Modo Oscuro
                </button>
            </div>
            {{ $slot }}
        </div>
    </main>

    <x-footer />

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

</body>
</html>
