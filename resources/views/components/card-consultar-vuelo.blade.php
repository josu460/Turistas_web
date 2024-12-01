<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow mt-5 mb-5 md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <!-- Imagen -->
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
        src="{{ asset('storage/' . $vuelo->imagen) }}" alt="Imagen de vuelo">

    <div class="flex flex-col justify-between p-4 leading-normal w-full">
        <h2 class="font-semibold text-xl mb-2">Número de vuelo: {{ $vuelo->novuelo }}</h2>
        <p><strong>Fecha de salida:</strong> {{ $vuelo->fechasalida }}</p>
        <p><strong>Fecha de regreso:</strong> {{ $vuelo->fecharegreso }}</p>
        <p><strong>Precio:</strong> ${{ number_format($vuelo->precio, 2) }}</p>
        <p><strong>Hora:</strong> {{ $vuelo->hora }}</p>
        <p><strong>Duración:</strong> {{ $vuelo->duracion }}</p>
        <p><strong>Número de Asientos:</strong> {{ $vuelo->numeroasientos }}</p>
        <p><strong>Aerolínea:</strong> {{ $vuelo->aerolinea->aerolinea }}</p>
        <p><strong>Origen:</strong> {{ $vuelo->origen->lugar }}</p>
        <p><strong>Destino:</strong> {{ $vuelo->destino->lugar }}</p>

        <div class="flex space-x-8">
            <!-- Modal toggle button for Edit -->
            <button data-modal-target="editarvuelo-modal-{{$vuelo->id}}" data-modal-toggle="editarvuelo-modal-{{$vuelo->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Editar
            </button>

            <!-- Modal for editing flight -->
            <div id="editarvuelo-modal-{{$vuelo->id}}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Editar Vuelo</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editarvuelo-modal-{{$vuelo->id}}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="{{ route('vuelos.update', $vuelo->id) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Usamos PUT para indicar que es una actualización -->

                                <!-- Número de vuelo -->
                                <div>
                                    <label for="novuelo" class="block text-sm font-medium text-gray-700">Número de Vuelo</label>
                                    <input type="text" id="novuelo" name="novuelo" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500" placeholder="Ejemplo: 456A5" value="{{ old('novuelo', $vuelo->novuelo) }}">
                                    <small>{{$errors->first('novuelo')}}</small>
                                </div>

                                <!-- Fecha de salida -->
                                <div class="col-span-1">
                                    <label for="fechasalida" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Salida</label>
                                    <input type="date" id="fechasalida" name="fechasalida" class="w-full p-2.5 border border-gray-300 rounded-lg" value="{{ old('fechasalida', $vuelo->fechasalida) }}">
                                    <small>{{$errors->first('fechasalida')}}</small>
                                </div>

                                <!-- Fecha de regreso -->
                                <div class="col-span-1">
                                    <label for="fecharegreso" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Regreso</label>
                                    <input type="date" id="fecharegreso" name="fecharegreso" class="w-full p-2.5 border border-gray-300 rounded-lg" value="{{ old('fecharegreso', $vuelo->fecharegreso) }}">
                                    <small>{{$errors->first('fecharegreso')}}</small>
                                </div>

                                <!-- Precio -->
                                <div>
                                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                                    <input type="number" id="precio" name="precio" min="0" step="0.01" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500" value="{{ old('precio', $vuelo->precio) }}">
                                    <small>{{$errors->first('precio')}}</small>
                                </div>

                                <!-- Hora -->
                                <div>
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                                    <input type="text" id="hora" name="hora" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500" value="{{ old('hora', $vuelo->hora) }}">
                                    <small>{{$errors->first('hora')}}</small>
                                </div>

                                <!-- Duración -->
                                <div>
                                    <label for="duracion" class="block text-sm font-medium text-gray-700">Duración del vuelo</label>
                                    <input type="text" id="duracion" name="duracion" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500" value="{{ old('duracion', $vuelo->duracion) }}">
                                    <small>{{$errors->first('duracion')}}</small>
                                </div>

                                <!-- Número de Asientos -->
                                <div>
                                    <label for="numeroasientos" class="block text-sm font-medium text-gray-700">Número de Asientos</label>
                                    <input type="text" id="numeroasientos" name="numeroasientos" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500" value="{{ old('numeroasientos', $vuelo->numeroasientos) }}">
                                    <small>{{$errors->first('numeroasientos')}}</small>
                                </div>

                                <!-- Imagen -->
                                <div>
                                    <label for="imagen" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
                                    <input type="file" id="imagen" name="imagen" accept="image/*" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                    <small class="text-red-500">{{ $errors->first('imagen') }}</small>
                                </div>
                                <div>
                                    <label for="id_aerolinea" class="block text-sm font-medium text-gray-700">Aerolínea</label>
                                    <select id="id_aerolinea" name="id_aerolinea" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Seleccione una aerolínea</option>
                                        @foreach($aerolineas as $aerolinea)
                                        <option value="{{ $aerolinea->id }}"
                                            {{ old('id_aerolinea', $vuelo->aerolinea_id) == $aerolinea->id ? 'selected' : '' }}>
                                            {{ $aerolinea->aerolinea }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <small>{{ $errors->first('id_aerolinea') }}</small>
                                </div>

                                <!-- Origen -->
                                <div>
                                    <label for="id_origen">Origen</label>
                                    <select id="id_origen" name="id_origen">
                                        <option value="">Seleccione un origen</option>
                                        @foreach($lugares as $lugar)
                                        <option value="{{ $lugar->id }}" {{ old('id_origen', $vuelo->origen_id) == $lugar->id ? 'selected' : '' }}>
                                            {{ $lugar->lugar }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Destino -->
                                <div>
                                    <label for="id_destino">Destino</label>
                                    <select id="id_destino" name="id_destino">
                                        <option value="">Seleccione un destino</option>
                                        @foreach($lugares as $lugar)
                                        <option value="{{ $lugar->id }}" {{ old('id_destino', $vuelo->destino_id) == $lugar->id ? 'selected' : '' }}>
                                            {{ $lugar->lugar }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Botones -->
                                <div class="text-center">
                                    <button type="submit" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                        Editar
                                    </button>
                                    <button data-modal-hide="editarvuelo-modal-{{$vuelo->id}}" type="button" class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                        Cancelar
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal toggle button for Delete -->
            <button data-modal-target="popup-modal-{{$vuelo->id}}" data-modal-toggle="popup-modal-{{$vuelo->id}}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Eliminar
            </button>

            <!-- Modal for deleting flight -->
            <div id="popup-modal-{{$vuelo->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$vuelo->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l6-6m0 0l-6-6m6 6H4" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro de que deseas eliminar este vuelo?</h3>
                            <form action="{{ route('vuelos.destroy', $vuelo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Eliminar</button>
                            </form>
                            <button data-modal-hide="popup-modal-{{$vuelo->id}}" type="button" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>