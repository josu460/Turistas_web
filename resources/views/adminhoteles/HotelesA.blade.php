<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('exito'))
    @session ('exito')
    <script>
        Swal.fire({
            title: "Todo correcto ",
            text: " {{$value}}",
            icon: "success"
        });
    </script>
    @endsession
    @endif
    <div class="bg-blue-500 text-white py-8 px-4">
        <h1 class="text-2xl font-bold text-center">REGISTRAR HOTEL</h1>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-lg mx-auto max-w-md mt-5">
        <form action="/añadirHotel" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nombreHotel" class="block text-sm font-medium text-gray-700">Nombre del hotel</label>
                <input type="text" id="nombreHotel" name="nombreHotel"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: Hotel Paradise">
                <small>{{$errors->first('nombreHotel')}}</small>
            </div>

            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría del hotel</label>
                <select id="categoria" name="categoria"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione una categoría</option>
                    <option value="Economico">Económico</option>
                    <option value="Medio">Medio</option>
                    <option value="Lujo">Lujo</option>
                </select>
                <small>{{$errors->first('categoria')}}</small>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio por noche (USD)</label>
                <input type="number" id="precio" name="precio" rmin="0" step="0.01"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="120.00">
                <small>{{$errors->first('precio')}}</small>
            </div>

            <div>
                <label for="servicios" class="block text-sm font-medium text-gray-700">Servicios</label>
                <textarea id="servicios" name="servicios"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: WiFi, piscina, restaurante"></textarea>
                <small>{{$errors->first('servicios')}}</small>
            </div>

            <div>
                <label for="distancia" class="block text-sm font-medium text-gray-700">Distancia del centro (km)</label>
                <input type="number" id="distancia" name="distancia" min="0" step="0.1"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: 1.5">
                <small>{{$errors->first('distancia')}}</small>
            </div>

            <div>
                <label for="estrellas" class="block text-sm font-medium text-gray-700">Estrellas</label>
                <select id="estrellas" name="estrellas"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione las estrellas</option>
                    <option value="1">1 estrella</option>
                    <option value="2">2 estrellas</option>
                    <option value="3">3 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="5">5 estrellas</option>
                </select>
                <small>{{$errors->first('estrellas')}}</small>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Registrar Hotel
                </button>
            </div>
        </form>
    </div>
    </div>

    <x-Footer> </x-Footer>
</x-app-layout>