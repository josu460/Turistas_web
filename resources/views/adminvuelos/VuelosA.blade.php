<x-app-layout>


    <div class="bg-blue-500 text-white py-8 px-4">
        <h1 class="text-2xl font-bold text-center">CONSULTAR VUELOS</h1>
    </div>

    <div class="flex justify-end mt-4">
        <!-- Botón para abrir el modal -->
        <button data-modal-target="crearAerolinea-modal" data-modal-toggle="crearAerolinea-modal"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-full mr-5" type="button">
            Agregar Aerolínea
        </button>

        <!-- Modal para registrar aerolínea -->
        <div id="crearAerolinea-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Contenido del modal -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Encabezado del modal -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Registrar Aerolínea
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="crearAerolinea-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Cerrar</span>
                        </button>
                    </div>
                    <!-- Cuerpo del modal con el formulario -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ route('aerolineas.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="aerolinea" class="block text-sm font-medium text-gray-700">Nombre de la Aerolínea</label>
                                <input type="text" id="aerolinea" name="aerolinea"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Ejemplo: Aerolíneas del Cielo">
                                <small class="text-red-500">{{ $errors->first('aerolinea') }}</small>
                            </div>
                            <!-- Botones del formulario -->
                            <div class="text-center mt-4">
                                <button type="submit" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                    Guardar
                                </button>
                                <button data-modal-hide="crearAerolinea-modal" type="button"
                                    class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                        @if (session('yeah'))
                        <script>
                            Swal.fire({
                                title: "Todo correcto ",
                                text: "{{ session('yeah') }}",
                                icon: "success"
                            });
                        </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón para abrir el modal -->
        <button data-modal-target="crearLugar-modal" data-modal-toggle="crearLugar-modal"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-full mr-5" type="button">
            Agregar Lugar
        </button>

        <!-- Modal para agregar un lugar -->
        <div id="crearLugar-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Contenido del modal -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Encabezado del modal -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Registrar Lugar
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="crearLugar-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Cerrar</span>
                        </button>
                    </div>
                    
                    <!-- Cuerpo del modal con el formulario -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ route('lugars.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="lugar" class="block text-sm font-medium text-gray-700">Nombre del Lugar</label>
                                <input type="text" id="lugar" name="lugar"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Ejemplo: Ciudad de México">
                                <small class="text-red-500">{{ $errors->first('lugar') }}</small>
                            </div>
                            <!-- Botones del formulario -->
                            <div class="text-center mt-4">
                                <button type="submit" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                    Guardar
                                </button>
                                <button data-modal-hide="crearLugar-modal" type="button"
                                    class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                        @if (session('corectou'))
                        <script>
                            Swal.fire({
                                title: "Todo correcto ",
                                text: "{{ session('corectou') }}",
                                icon: "success"
                            });
                        </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>


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
                        <form action="{{ route('vuelos.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="novuelo" class="block text-sm font-medium text-gray-700">Numero de Vuelo</label>
                                <input type="text" id="novuelo" name="novuelo"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Ejemplo: 456A5">
                                <small>{{$errors->first('novuelo')}}</small>
                            </div>


                            <div class="col-span-1">
                                <label for="fechasalida" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Salida</label>
                                <input type="date" id="fechasalida" name="fechasalida" class="w-full p-2.5 border border-gray-300 rounded-lg">
                                <small>{{$errors->first('fechasalida')}}</small>
                            </div>

                            <div class="col-span-1">
                                <label for="fecharegreso" class="block mb-2 text-sm font-medium text-gray-700">Fecha de regreso</label>
                                <input type="date" id="fecharegreso" name="fecharegreso" class="w-full p-2.5 border border-gray-300 rounded-lg">
                                <small>{{$errors->first('fecharegreso')}}</small>
                            </div>


                            <div>
                                <label for="precio" class="block text-sm font-medium text-gray-700">Precio por boleto:</label>
                                <input type="number" id="precio" name="precio" min="0" step="0.01"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="120.00">
                                <small>{{$errors->first('precio')}}</small>
                            </div>
                            <div>
                                <label for="hora" class="block text-sm font-medium text-gray-700">Hora </label>
                                <input type="number" id="hora" name="hora"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="8:00pm">
                                <small>{{$errors->first('hora')}}</small>
                            </div>

                            <div>
                                <label for="duracion" class="block text-sm font-medium text-gray-700">Duración del vuelo</label>
                                <input type="text" id="duracion" name="duracion"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="4 horas ">
                                <small>{{$errors->first('duracion')}}</small>
                            </div>

                            <div>
                                <label for="numeroasientos" class="block text-sm font-medium text-gray-700">Numero de Asientos </label>
                                <input type="text" id="numeroasientos" name="numeroasientos"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                <small>{{$errors->first('numeroasientos')}}</small>
                            </div>
                            
                            <div>
                                <label for="escala">Escala</label>
                                <select name="escala" id="escala" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="noescala" {{ old('escala') == 'noescala' ? 'selected' : '' }}>Sin escala</option>
                                    <option value="siescala" {{ old('escala') == 'siescala' ? 'selected' : '' }}>Con escala</option>
                                </select>
                            </div>

                            <div>
                                <label for="imagen" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
                                <input type="file" id="imagen" name="imagen" accept="image/*"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                <small class="text-red-500">{{ $errors->first('imagen') }}</small>
                            </div>
                            <div>
                                <label for="id_aerolinea" class="block text-sm font-medium text-gray-700">Aerolínea</label>
                                <select id="id_aerolinea" name="id_aerolinea"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Seleccione una aerolínea</option>
                                    @foreach($aerolineas as $aerolinea)
                                    <option value="{{ $aerolinea->id }}">{{ $aerolinea->aerolinea }}</option>
                                    @endforeach
                                </select>
                                <small>{{ $errors->first('id_aerolinea') }}</small>
                            </div>

                            <div>
                                <label for="id_origen" class="block text-sm font-medium text-gray-700">Origen</label>
                                <select id="id_origen" name="id_origen"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Seleccione un origen</option>
                                    @foreach($lugars as $lugar)
                                    <option value="{{ $lugar->id }}">{{ $lugar->lugar }}</option>
                                    @endforeach
                                </select>
                                <small>{{ $errors->first('id_origen') }}</small>
                            </div>

                            <div>
                                <label for="id_destino" class="block text-sm font-medium text-gray-700">Destino</label>
                                <select id="id_destino" name="id_destino"
                                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Seleccione un destino</option>
                                    @foreach($lugars as $lugar)
                                    <option value="{{ $lugar->id }}">{{ $lugar->lugar }}</option>
                                    @endforeach
                                </select>
                                <small>{{ $errors->first('id_destino') }}</small>
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
        <script>
            Swal.fire({
                title: "Todo correcto ",
                text: "{{ session('exito') }}",
                icon: "success"
            });
        </script>
        @endif
    </div>


    <div class="bg-white p-6 rounded-lg shadow-lg mx-auto max-w-8xl mt-5 grid grid-cols-3 gap-6">
        @foreach ($vuelos as $vuelo)
        <x-card-consultar-vuelo :vuelo="$vuelo" :aerolineas="$aerolineas" :lugares="$lugars"></x-card-consultar-vuelo>
        @endforeach
    </div>
    <x-Footer> </x-Footer>
</x-app-layout>