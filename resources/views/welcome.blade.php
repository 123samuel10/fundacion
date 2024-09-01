<x-layout>
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex flex-col sm:flex-row items-center justify-center">
            <img src="{{ asset('storage/uploads/fundacion.jpg') }}" alt="Fundación Genios" class="w-full sm:w-1/2 h-auto mx-auto rounded-lg shadow-lg mb-6 sm:mb-0 sm:mr-6">

            <div class="text-center sm:text-left">
                <h2 class="text-4xl font-normal text-black mb-3" style="font-family: 'Fredericka the Great'">Fundación Genios</h2>
                <p class="text-md text-black leading-7">
                    La Fundación Genios ofrece programas de educación en
                    programación, artes, idiomas, pensamiento lógico, ciencia y música
                    para niños y jóvenes. Estos cursos están diseñados para fomentar el desarrollo de
                    habilidades críticas y creativas, preparando a los estudiantes para un futuro exitoso. La
                    matrícula tiene un costo de <span class="font-semibold text-red-500">100.000 pesos mensuales</span>,
                    incluyendo acceso a todos los recursos y clases.
                </p>
            </div>
        </div>
    </main>
</x-layout>
