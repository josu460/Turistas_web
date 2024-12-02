<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/vuelos.css') }}">

    <div class="bg-blue-500 text-white py-8 px-4">
        <h1 class="text-2xl font-bold text-center">VUELOS A CADA RINCON DEL MUNDO</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg mx-auto max-w-7xl mt-5">
        <form action="/buscarVuelo" method="POST" class="grid grid-cols-1 md:grid-cols-6 gap-4">
            @csrf
            <!-- Aerolínea -->
            <div class="col-span-1">
                <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-700">Aerolinea</label>
                <input type="text" id="aerolinea" name="aerolinea" class="w-full p-2.5 border border-gray-300 rounded-lg" placeholder="Aerolinea">
                <small>{{ $errors->first('aerolinea') }}</small>
            </div>

            <!-- Escalas -->
            <div class="col-span-1">
                <label for="escala" class="block mb-2 text-sm font-medium text-gray-700">Escalas</label>
                <select id="escala" name="escala" class="w-full p-2.5 border border-gray-300 rounded-lg">
                    <option value="default" disabled selected>Selecciona</option>
                    <option value="noescala">No</option>
                    <option value="siescala">Sí</option>
                </select>
                <small>{{ $errors->first('escala') }}</small>
            </div>

            <!-- Hora -->
            <div class="col-span-1">
                <label for="hora" class="block mb-2 text-sm font-medium text-gray-700">Horario</label>
                <input type="number" id="hora" name="hora" class="w-full p-2.5 border border-gray-300 rounded-lg" placeholder="Horario">
                <small>{{ $errors->first('hora') }}</small>
            </div>

            <!-- Precio -->
            <div class="col-span-1 md:col-span-2">
                <label for="tarifa" class="block mb-2 text-sm font-medium text-gray-700">Precio</label>
                <select id="tarifa" name="tarifa" class="w-full p-2.5 border border-gray-300 rounded-lg" required>
                    <option value="default" disabled selected>Seleccione una tarifa</option>
                    <option value="premium">Premium </option>
                    <option value="flex">Flexible</option>
                    <option value="superflex">Muy economica</option>
                </select>
                <small>{{ $errors->first('tarifa') }}</small>
            </div>


            <!-- Origen -->
            <div class="col-span-2">
                <label for="origen" class="block mb-2 text-sm font-medium text-gray-700">Desde</label>
                <input type="text" id="origen" name="origen" class="w-full p-2.5 border border-gray-300 rounded-lg" placeholder="Origen" value="{{ old('origen') }}">
                <small>{{ $errors->first('origen') }}</small>
            </div>

            <!-- Destino -->
            <div class="col-span-2">
                <label for="destino" class="block mb-2 text-sm font-medium text-gray-700">A</label>
                <input type="text" id="destino" name="destino" class="w-full p-2.5 border border-gray-300 rounded-lg" placeholder="Destino" value="{{ old('destino') }}">
                <small>{{ $errors->first('destino') }}</small>
            </div>

            <!-- Fecha de despegue -->
            <div class="col-span-1">
                <label for="fecha_despegue" class="block mb-2 text-sm font-medium text-gray-700">Ida</label>
                <input type="date" id="fecha_despegue" name="fecha_despegue" class="w-full p-2.5 border border-gray-300 rounded-lg">
                <small>{{ $errors->first('fecha_despegue') }}</small>
            </div>

            <!-- Fecha de regreso -->
            <div class="col-span-1">
                <label for="fecha_regreso" class="block mb-2 text-sm font-medium text-gray-700">Vuelta</label>
                <input type="date" id="fecha_regreso" name="fecha_regreso" class="w-full p-2.5 border border-gray-300 rounded-lg">
                <small>{{ $errors->first('fecha_regreso') }}</small>
            </div>

            <!-- Botón de búsqueda -->
            <div class="col-span-1 md:col-span-6">
                <button type="submit" class="w-full boton-estilo text-white py-2.5 rounded-lg font-semibold hover:bg-customBlue transition">
                    Buscar
                </button>
            </div>
        </form>

        @if (session('loading'))
        @session ('loading')
        <script>
            Swal.fire({
                title: 'Loading...',
                didOpen: () => {
                    Swal.showLoading(); 
                }
            });

            // Para cerrar la alerta después de un tiempo simulado de "carga"
            setTimeout(() => {
                Swal.close(); // Cierra el cuadro de diálogo de carga después de 2 segundos
            }, 1500)
        </script>
        @endsession
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @forelse ($resultados as $vuelo)
        <x-cardvuelos :vuelo="$vuelo" :aerolineas="$aerolineas" :lugares="$lugares"></x-cardvuelos>
        @empty
        <p>No se encontraron vuelos que coincidan con tu búsqueda.</p>
        @endforelse
    </div>


    <x-Footer> </x-Footer>
</x-app-layout>