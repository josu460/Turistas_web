<x-app-layout>
  @section('titulo', 'Hoteles')
  @section('contenido')

  <!-- Contenedor Principal -->
<main class="flex flex-col mt-5 w-full">

<!-- Encabezado -->
<h1 class="text-center text-blue-500 text-4xl">Búsqueda de Hoteles</h1>

<!-- Contenedor del formulario de búsqueda -->
<div class="mt-5 mx-3 p-5 rounded-lg bg-blue-400 shadow-lg">

  <!-- Formulario de búsqueda -->
  <form id="formBusqueda" class="flex flex-col md:flex-row justify-between" action="{{ route('hotel.buscarHotel') }}" method="POST">
  @if (session('exito'))
    @session('exito')
      <script>
        Swal.fire({
          title: "Todo correcto",
          text: "{{$value}}",
          icon: "success"
        });
      </script>
    @endsession
  @endif


      @csrf <!-- Token CSRF necesario para las solicitudes POST en Laravel -->
          
      <!-- Campo de texto para el destino del hotel -->
      <input type="text" 
             name="campoDestino" 
             placeholder="¿Tu próximo destino es...?"
             value="{{ old('campoHotel') }}" 
             class="w-1/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">      

    <!-- Fechas de check-in y check-out -->
    <div id="date-range-picker" date-rangepicker class="flex items-center gap-2">
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" 
               aria-hidden="true" 
               xmlns="http://www.w3.org/2000/svg" 
               fill="currentColor" 
               viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
        </div>
        <input value="{{ old('campoInicio') }}" id="datepicker-range-start" name="campoInicio" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-40 pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Fecha de entrada">
      </div>
      <span class="mx-2 text-gray-500">a</span>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </div>
        <input value="{{ old('campoFin') }}" id="datepicker-range-end" name="campoFin" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-40 pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Fecha de Salida">
      </div>
    </div>

 <!-- Menú desplegable para habitaciones y huéspedes -->
<div class="relative">
<button class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-4 py-2.5 w-full flex items-center justify-between" type="button" data-dropdown-toggle="guest-dropdown">
  Habitaciones y Huéspedes
  <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
  </svg>
</button>

<div id="guest-dropdown" class="hidden absolute z-10 bg-white rounded-lg shadow-lg w-64 mt-2">
  <div class="p-4">
    
    <!-- Campo para adultos -->
    <label class="flex justify-between items-center">
      <span>Adultos</span>
      <div class="flex items-center">
        <button type="button" class="px-2 py-1 text-blue-600" onclick="actualizarConteoHuespedes('campoAdultos', -1)">-</button>
        <span class="mx-2" id="campoAdultos-count">0</span>
        <button type="button" class="px-2 py-1 text-blue-600" onclick="actualizarConteoHuespedes('campoAdultos', 1)">+</button>
      </div>
    </label>
    
    <!-- Campo oculto para adultos -->
    <input type="hidden" name="campoAdultos" id="campoAdultos" value="0">
    
    <!-- Campo para infantes -->
    <label class="flex justify-between items-center mt-2">
      <span>Niños</span>
      <div class="flex items-center">
        <button type="button" class="px-2 py-1 text-blue-600" onclick="actualizarConteoHuespedes('campoInfantes', -1)">-</button>
        <span class="mx-2" id="campoInfantes-count">0</span>
        <button type="button" class="px-2 py-1 text-blue-600" onclick="actualizarConteoHuespedes('campoInfantes', 1)">+</button>
      </div>
    </label>
    
    <!-- Campo oculto para infantes -->
    <input type="hidden" name="campoInfantes" id="campoInfantes" value="0">
    
    <!-- Campo para habitaciones -->
    <label class="flex justify-between items-center mt-2">
      <span>Habitaciones</span>
      <div class="flex items-center">
        <button type="button" class="px-2 py-1 text-blue-600" onclick="actualizarConteoHuespedes('campoHabitaciones', -1)">-</button>
        <span class="mx-2" id="campoHabitaciones-count">0</span>
        <button type="button" class="px-2 py-1 text-blue-600" onclick="actualizarConteoHuespedes('campoHabitaciones', 1)">+</button>
      </div>
    </label>
    
    <!-- Campo oculto para habitaciones -->
    <input type="hidden" name="campoHabitaciones" id="campoHabitaciones" value="0">
    
  </div>
</div>
</div>

    <!-- Botón de búsqueda -->
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:ring-4 focus:ring-blue-300">
      Buscar
    </button>
  </form>        
</div>

@if ($errors->any())
<div class="flex p-4 mx-3 my-3 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium">Asegurate de cumplir con los siguiente campos:</span>
    <ul class="mt-1.5 list-disc list-inside">
      @if ($errors->has('campoHotel'))          
      <li>          
          <span>{{$errors->first('campoHotel')}}</span>          
      </li>
      @endif
      @if ($errors->has('campoInicio'))
      <li>
        <span>{{$errors->first('campoInicio')}}</span>
      </li>
      @endif
      @if ($errors->has('campoFin'))
      <li>
        <span>{{$errors->first('campoFin')}}</span>
      </li>
      @endif
      @if ($errors->has('campoAdultos'))
      <li>
        <span>{{$errors->first('campoAdultos')}}</span>
      </li>
      @endif
      @if ($errors->has('campoInfantes'))
      <li>
        <span>{{$errors->first('campoInfantes')}}</span>
      </li>
      @endif
      @if ($errors->has('campoHabitaciones'))
      <li>
        <span>{{$errors->first('campoHabitaciones')}}</span>
      </li>
      @endif     
    </ul>
  </div>
</div>
@endif

<!-- Contenedor de los filtros y lista de resultados de hoteles -->
<div class="flex flex-row mt-5 ml-3">

  <!-- Contenedor de los filtros -->
  <div>

    <!-- Encabezado de los filtros -->
    <h3 class="mt-1 rounded-lg bg-blue-400 shadow-lg text-center mb-4">Filtros</h3>

    <ul class="w-56 mb-5 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    
      <!-- Filtro por categoría (1 estrella) -->
      <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
      <div class="flex items-center ps-3">
        <label for="category" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Categoría (Estrellas)</label>
      </div>
      <div class="flex justify-between items-center px-3 py-2">
        <input type="radio" name="campoEstrellas" id="1-star" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="1-star" class="text-sm">1 Estrella</label>
        <div class="flex text-yellow-300">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
        </div>
      </div>
      
      <!-- Filtro por categoría (2 estrellas) -->
      <div class="flex justify-between items-center px-3 py-2">
        <input type="radio" name="campoEstrellas" id="2-star" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="2-star" class="text-sm">2 Estrellas</label>
        <div class="flex text-yellow-300">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
        </div>
      </div>
      
      <!-- Filtro por categoría (3 estrellas) -->
      <div class="flex justify-between items-center px-3 py-2">
        <input type="radio" name="campoEstrellas" id="3-star" value="3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="3-star" class="text-sm">3 Estrellas</label>
        <div class="flex text-yellow-300">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
        </div>
      </div>

      <!-- Filtro por categoría (4 estrellas) -->
      <div class="flex justify-between items-center px-3 py-2">
        <input type="radio" name="campoEstrellas" id="4-star" value="4" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="4-star" class="text-sm">4 Estrellas</label>
        <div class="flex text-yellow-300">
          <!-- SVG de 4 estrellas -->
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
        </div>
      </div>
      
      <!-- Filtro por categoría (5 estrellas) -->
      <div class="flex justify-between items-center px-3 py-2">
        <input type="radio" name="campoEstrellas" id="5-star" value="5" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="5-star" class="text-sm">5 Estrellas</label>
        <div class="flex text-yellow-300">
          <!-- SVG de 5 estrellas -->
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1" />
          </svg>
        </div>
      </div>

    </li>


    <!-- Filtro por precio -->
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
      <div class="flex items-center ps-3">
        <label for="price-range" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Precio (MXN)</label>
          <span id="price-value" class="ms-2 mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">$1000</span>
      </div>
      <div class="px-4 py-2">
        <input type="range" id="price-range" name="campoPrecio" min="1000" max="4000" value="1000" class="w-full" oninput="updatePriceValue(this.value)">
          <div class="flex justify-between text-gray-500 text-sm">
            <span>$1000</span>
            <span>$4000</span>
        </div>
      </div>
    </li>

    <!-- Filtro por distancia -->
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
      <div class="flex items-center ps-3">
        <label for="distance-range" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Distancia (km)</label>
          <span id="distance-value" class="ms-2 mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">1</span>
      </div>
      <div class="px-4 py-2">
        <input type="range" id="distance-range" name="campoDistancia" min="1" max="100" value="1" class="w-full" oninput="updateDistanceValue(this.value)">
          <div class="flex justify-between text-gray-500 text-sm">
            <span>1 km</span>
            <span>100 km</span>
          </div>
      </div>
    </li>

    <!-- Filtro por servicios -->
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
      <div class="flex items-center ps-3">
        <label for="services" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Servicios</label>
      </div>
      <div class="flex items-center ps-3">
        <input value="wifi" name="campoServicios[]" type="checkbox" id="wifi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="wifi" class="ms-2 text-sm">WiFi</label>
      </div>
      <div class="flex items-center ps-3">
        <input value="piscina" name="campoServicios[]" type="checkbox" id="pool" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="pool" class="ms-2 text-sm">Piscina</label>
      </div>
      <div class="flex items-center mb-4 ps-3">
        <input value="desayuno" name="campoServicios[]" type="checkbox" id="breakfast" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
        <label for="breakfast" class="ms-2 text-sm">Desayuno incluido</label>
      </div>
    </li>  
  </ul>
</div>

<!-- Contenedor de la lista de resultados de hoteles -->
<div class="container mx-auto px-4">
                
  <!-- Lista de hoteles -->
  <ul class="divide-y divide-gray-200">

  @if(isset($hoteles))
    @foreach($hoteles as $hotel)
      <li class="py-4 flex flex-col lg:flex-row items-start lg:items-center space-y-4 lg:space-y-0 lg:space-x-6">
        <!-- Imagen del hotel debe ser cargada desde la base de datos -->
        <img src="{{ asset('img/Oaxaca.jpg')}}" alt="Hotel 1" class="w-full lg:w-40 h-32 object-cover rounded-md">
        <div class="flex-1 space-y-2">
          <div class="flex justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$hotel->hotel}}</h3>
            <p class="text-sm text-gray-500 dark:text-gray-300">Ubicación: {{$hotel->ubicacion}}</p>
        </div>

        <div class="flex items-center space-x-2 text-yellow-400">
          <!-- Calificación de estrellas -->
          <span class="text-lg">
            @switch($hotel->calificacion_estrellas)
              @case(1)
                &#9733;&#9734;&#9734;&#9734;&#9734;
              @break
              @case(2)
                &#9733;&#9733;&#9734;&#9734;&#9734;
              @break
              @case(3)
                &#9733;&#9733;&#9733;&#9734;&#9734;
              @break
              @case(4)
                &#9733;&#9733;&#9733;&#9733;&#9734;
              @break
              @case(5)
                &#9733;&#9733;&#9733;&#9733;&#9733;
              @break
            @endswitch
          </span>
          <span class="text-sm text-gray-500">({{$hotel->calificacion_estrellas}} / 5)</span>
        </div>

        <p class="text-gray-500 dark:text-gray-300">Precio por noche: <span class="font-semibold">${{$hotel->precio}}</span></p>
        <p class="text-gray-500 dark:text-gray-300">Habitaciones disponibles: <span class="font-semibold">{{$hotel->nohabitaciones}}</span></p>

        <!-- Button to open the drawer -->
        <button class="text-blue-600 hover:underline dark:text-blue-400" type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
          Ver detalles
        </button>

        <!-- Drawer component -->
        <div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-96 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
              
          <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
          <svg class="w-4 h-4 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
            Detalles del Hotel
          </h5>
              
          <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
          </button>

          <!-- Hotel details -->
          <div class="flex flex-col items-start space-y-4">
            <div id="controls-carousel" class="relative w-full" data-carousel="static">
                    
              <!-- Carousel wrapper -->
              <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <img src="{{ asset('img/Oaxaca.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                    
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                  <img src="{{ asset('img/albercahotel.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                    
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <img src="{{ asset('img/bañohotel.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                    
                <!-- Item 4 -->
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/cuartohotel.jpeg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                  </div>
                    
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <img src="{{ asset('img/restaurantehotel.jpeg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>

                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                  </span>
                </button>
                
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                  <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                  </span>
                </button>
              </div>
              
              <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{$hotel->hotel}}</h2>
                                 
              <div class="flex items-center text-yellow-500">
                <span class="mr-2 text-sm font-medium">({{$hotel->calificacion_estrellas}} / 5)</span>
                <span class="text-sm">★★★★☆</span>
              </div>
                                    
              <p class="text-lg text-gray-900 dark:text-white"><strong>Precio por noche:</strong> ${{$hotel->precio}}</p>
              <p class="text-lg text-gray-900 dark:text-white"><strong>Habitaciones disponibles:</strong> {{$hotel->nohabitaciones}}</p>
                                    
              <div class="flex justify-center w-full">
                <button type="button" class="px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reservar</button>
              </div>
            </div>
          </div>
        </div>
         

      </li>
    @endforeach
  </ul>
  
  @else
    <h2 class="text-center text-2xl text-gray-500 dark:text-gray-300">
      No hay hoteles disponibles
    </h2>
  @endif
                    
  
  </div><!-- Se cierra el contenedor de la lista de hoteles -->
</div><!-- Se cierra el contenedor de los resultados de hoteles -->
</div><!-- Se cierra el contenedor de los filtros y resultados de hoteles -->

    
</main>

  <script>
    // Función para actualizar el conteo de cada campo del menu desplegable de habitaciones y huéspedes
    function actualizarConteoHuespedes(campo, cambio) {
      const contadorSpan = document.getElementById(`${campo}-count`);
      const entradaOculta = document.getElementById(campo);
      let conteo = parseInt(entradaOculta.value);
      conteo = Math.max(0, conteo + cambio); // Evita números negativos
      contadorSpan.textContent = conteo;
      entradaOculta.value = conteo;
    }

    function updatePriceValue(value) {
      document.getElementById("price-value").textContent = "$" + value;
    }

    function updateDistanceValue(value) {
      document.getElementById("distance-value").textContent = value;
    }

    
  // Obtener el formulario con el id 'formBusqueda'
  const form = document.getElementById('formBusqueda');

  // Función para agregar filtros específicos al formulario
  function addFiltersToForm() {
    // Filtro de estrellas
    const estrellas = document.querySelector('input[name="campoEstrellas"]:checked');
    if (estrellas) {
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.name = 'campoEstrellas';  // El nombre del filtro
      hiddenInput.value = estrellas.value;  // El valor seleccionado
      form.appendChild(hiddenInput);
    }

    // Filtro de precio (si es un input de texto o rango, por ejemplo)
    const precio = document.querySelector('input[name="campoPrecio"]');
    if (precio && precio.value) {
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.name = 'campoPrecio';  // El nombre del filtro
      hiddenInput.value = precio.value;  // El valor del filtro
      form.appendChild(hiddenInput);
    }

    // Filtro de distancia
    const distancia = document.querySelector('input[name="campoDistancia"]');
    if (distancia && distancia.value) {
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.name = 'campoDistancia';  // El nombre del filtro
      hiddenInput.value = distancia.value;  // El valor del filtro
      form.appendChild(hiddenInput);
    }

    // Filtro de servicios
    const servicios = document.querySelectorAll('input[name="campoServicios[]"]:checked');
    if (servicios.length > 0) {
      servicios.forEach(servicio => {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'camposServicios[]';  // El nombre del filtro
        hiddenInput.value = servicio.value;  // El valor del filtro
        form.appendChild(hiddenInput);
      });
    }
  }  

  // Agregar los filtros al formulario antes de enviarlo
  form.addEventListener('submit', function(e) {
    // Llamar a la función para agregar los filtros al formulario
    addFiltersToForm();
  });
  </script>

  <x-Footer></x-Footer>
</x-app-layout>
