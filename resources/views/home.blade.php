<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12 px-6">

    <div class="text-center">
        <h1 class="text-3xl font-bold text-teal-600">¡Bienvenidos a Nuestra Plataforma de Turismo!</h1>
        <p class="mt-4 text-gray-700 text-lg">
            Nos complace tenerte aquí. Explora nuestras opciones y encuentra el destino perfecto para tu próxima aventura.
        </p>
    </div>
    
    <!-- Carrusel de Imágenes -->
    <div id="animation-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-96 md:h-[500px] lg:h-[600px] overflow-hidden rounded-lg">
        <!-- Item 1 -->
        <div class="duration-200 ease-linear carousel-item" data-carousel-item="active">
            <img src="{{ asset('img/imagen1.jpg') }}" class="w-full h-full object-cover" alt="Imagen 1">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-200 ease-linear carousel-item" data-carousel-item>
            <img src="{{ asset('img/imagen2.jpg') }}" class="w-full h-full object-cover" alt="imagen 2">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-200 ease-linear carousel-item" data-carousel-item>
            <img src="{{ asset('img/Huasteca.jpg') }}" class="w-full h-full object-cover" alt="Imagen 4">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-200 ease-linear carousel-item" data-carousel-item>
            <img src="{{ asset('img/imagen3.1.jpg') }}" class="w-full h-full object-cover" alt="Imagen 5">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-200 ease-linear carousel-item" data-carousel-item>
            <img src="{{ asset('img/cabos.jpg') }}" class="w-full h-full object-cover" alt="Imagen 6">
        </div>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


    <!-- Contenido adicional (Tarjetas de servicios) -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Tarjeta 1 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Explora Ciudades Fascinantes</h5>
                <p class="mb-3 font-normal text-gray-700">Descubre la belleza cultural y paisajística de nuestras ciudades recomendadas.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                    Descubre Más
                    <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L15.586 10H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Vuelos económicos</h5>
                <p class="mb-3 font-normal text-gray-700">¿Prefieres un viaje único y a la vez económico? Explora nuestras opciones de viaje.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                    Descubre Más
                    <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L15.586 10H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Experiencias Únicas</h5>
                <p class="mb-3 font-normal text-gray-700">Disfruta de experiencias inolvidables que te conectarán con cada lugar.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                    Descubre Más
                    <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L15.586 10H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Botones de acción adicionales -->
    <div class="text-center mt-12">
        <a href="hoteles" class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-teal-500 rounded-lg hover:bg-teal-600 transition duration-300">
            Ver Hoteles Disponibles
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L15.586 10H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>

    <div class="text-center mt-12">
        <a href="Vuelos" class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-teal-500 rounded-lg hover:bg-teal-600 transition duration-300">
            Ver Vuelos Disponibles
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L15.586 10H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</div>

<x-Footer> </x-Footer>
</x-app-layout>
