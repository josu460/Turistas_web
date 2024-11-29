<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-blue-500 text-white py-8 px-4">
    <h1 class="text-2xl font-bold text-center">CONSULTAR VUELOS</h1>
</div>

<div class="flex justify-end mt-4">
    <!-- Modal toggle button -->
    <button data-modal-target="crearvuelo-modal" data-modal-toggle="crearvuelo-modal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-full" type="button">
        Crear Vuelo

    </button>

    <!-- Main modal -->
    <div id="crearvuelo-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex  items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Registrar Vuelo
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hotel-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span data-modal-hide="crearvuelo-modal" class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body with form -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="/crearVuelo" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label for="nombreVuelo" class="block text-sm font-medium text-gray-700">Destino</label>
                            <input type="text" id="nombreVuelo" name="nombreVuelo"
                                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Ejemplo: Irlanda">
                            <small>{{$errors->first('nombreVuelo')}}</small>
                        </div>

                        <div>
                            <label for="salida" class="block text-sm font-medium text-gray-700">Punto de partida:</label>
                            <input type="text" id="salida" name="salida"
                                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Ejemplo: Cuidad de México">
                            <small>{{$errors->first('salida')}}</small>
                        </div>


                        <div class="col-span-1">
                            <label for="fecha_despegueV" class="block mb-2 text-sm font-medium text-gray-700">Ida</label>
                            <input type="date" id="fecha_despegueV" name="fecha_despegueV" class="w-full p-2.5 border border-gray-300 rounded-lg">
                            <small>{{$errors->first('fecha_despegueV')}}</small>
                        </div>

                        <div class="col-span-1">
                            <label for="fecha_regresoV" class="block mb-2 text-sm font-medium text-gray-700">Vuelta</label>
                            <input type="date" id="fecha_regresoV" name="fecha_regresoV" class="w-full p-2.5 border border-gray-300 rounded-lg">
                            <small>{{$errors->first('fecha_regresoV')}}</small>
                        </div>

                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio por noche (USD)</label>
                            <input type="number" id="precio" name="precio" min="0" step="0.01"
                                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="120.00">
                            <small>{{$errors->first('precio')}}</small>
                        </div>

                        <div>
                            <label for="vueloT" class="block text-sm font-medium text-gray-700">Tipo de vuelo</label>
                            <textarea id="vueloT" name="vueloT"
                                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Ejemplo: Redondo"></textarea>
                            <small>{{$errors->first('vueloT')}}</small>
                        </div>


                        <div>
                            <label for="estrellas" class="block text-sm font-medium text-gray-700">Estrellas</label>
                            <select id="estrellas" name="estrellas"
                                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                <option value="default" disabled selected>Seleccione las estrellas</option>
                                <option value="1">1 estrella</option>
                                <option value="2">2 estrellas</option>
                                <option value="3">3 estrellas</option>
                                <option value="4">4 estrellas</option>
                                <option value="5">5 estrellas</option>
                            </select>
                            <small>{{$errors->first('estrellas')}}</small>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                Crear
                            </button>
                            <button data-modal-hide="crearvuelo-modal" type="button" class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
</div>


<div class="bg-white p-6 rounded-lg shadow-lg mx-auto max-w-8xl mt-5 grid grid-cols-3 gap-6">
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
    <x-card-consultar-vuelo></x-card-consultar-vuelo>
</div>

    <x-Footer> </x-Footer>
</x-app-layout>
