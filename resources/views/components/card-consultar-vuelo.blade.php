<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow mt-5 mb-5 md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('img/vuelocon.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal w-full">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Vuelo a Irlanda
        </h5>
        <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">
            Partiendo desde Ciudad de México
        </p>
        <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">
            Por Aeromexico
        </p>
        <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">
            04/12/2024 - 06/12/2024
        </p>
        <p class="mb-1 font-bold text-gray-700 dark:text-gray-400">
            $10,000 MXN
        </p>
        <p class="mb-1  font-normal text-gray-700 dark:text-gray-400">
            Vuelo redondo
        </p>
        <div class="mb-5 font-normal text-gray-700 dark:text-gray-400 flex items-center mt-2 space-x-1">
            @for ($i = 0; $i < 5; $i++)
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                </svg>
                @endfor
        </div>


        <div class="flex space-x-8 ">
            <!-- Modal toggle button -->
            <button data-modal-target="editarvuelo-modal" data-modal-toggle="editarvuelo-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Editar

            </button>

            <!-- Main modal -->
            <div id="editarvuelo-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex  items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Editar Vuelo
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hotel-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body with form -->
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="/editarVuelo" method="POST" class="space-y-5">
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
                                    <button type="submit" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                        Editar
                                    </button>
                                    <button data-modal-hide="editarvuelo-modal" type="button" class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="inline-flex items-center px-5 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Eliminar
            </button>

            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de que quieres eliminar este vuelo?</h3>
                            <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Si, Estoy seguro
                            </button>
                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancelar</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>