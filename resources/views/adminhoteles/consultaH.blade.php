<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultar Hoteles') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('exito'))
    <script>
        Swal.fire({
            title: "Todo correcto ",
            text: "{{ session('exito') }}",
            icon: "success"
        });
    </script>
    @endif

    <div class="max-w-sm mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-500 text-white px-6 py-4">
            <h2 class="text-xl font-bold">Hotel Ejemplo</h2>
            <p class="text-sm">Ubicación: Ciudad Ejemplo</p>
        </div>
        <div class="p-6">
            <p class="text-gray-700"><strong>Check-in:</strong> 12:00 PM</p>
            <p class="text-gray-700"><strong>Check-out:</strong> 11:00 AM</p>
            <p class="text-gray-700"><strong>Habitaciones:</strong> 20</p>
            <p class="text-gray-700"><strong>Calificación:</strong> 4.5</p>
            <div class="mt-4 flex justify-between">
                <button id="openModal" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg text-sm">
                    Editar
                </button>

                <form method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este hotel?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-sm">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96 lg:w-1/3 xl:w-1/4">
            <h3 class="text-xl font-semibold text-gray-800">Editar Hotel</h3>

            <form action="/editarHotel" method="POST">
                @csrf
                @method('PUT')

                <div>
                <label for="hotel" class="block text-sm font-medium text-gray-700">Nombre del hotel</label>
                <input type="text" id="hotel" name="hotel"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: Hotel Paradise">
                <small>{{$errors->first('hotel')}}</small>
            </div>

            <div>
                <label for="no_habitaciones" class="block text-sm font-medium text-gray-700">Número de habitaciones</label>
                <input type="number" id="no_habitaciones" name="no_habitaciones" min="1"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: 10">
                <small>{{$errors->first('no_habitaciones')}}</small>
            </div>

            <div>
                <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación (Opcional)</label>
                <input type="number" id="calificacion" name="calificacion" min="1" max="5"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: 4">
                <small>{{$errors->first('calificacion')}}</small>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio por noche (USD)</label>
                <input type="number" id="precio" name="precio" min="0" step="0.01"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: 120.00">
                <small>{{$errors->first('precio')}}</small>
            </div>

            <div>
                <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación</label>
                <input type="text" id="ubicacion" name="ubicacion"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: Avenida Principal #123, Ciudad">
                <small>{{$errors->first('ubicacion')}}</small>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion" name="descripcion"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: Hotel con vista al mar, piscina, y restaurante gourmet"></textarea>
                <small>{{$errors->first('descripcion')}}</small>
            </div>

            <div>
                <label for="politicas_cancelacion" class="block text-sm font-medium text-gray-700">Políticas de cancelación (Opcional)</label>
                <textarea id="politicas_cancelacion" name="politicas_cancelacion"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: Cancelaciones permitidas con 48 horas de antelación"></textarea>
                <small>{{$errors->first('politicas_cancelacion')}}</small>
            </div>



                <div class="mt-6 flex justify-between">
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Registrar Hotel
                </button>
                    <button id="closeModal" type="button" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-sm">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-footer></x-footer>

    <script>
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('editModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('editModal').classList.add('hidden');
        });
    </script>

</x-app-layout>
