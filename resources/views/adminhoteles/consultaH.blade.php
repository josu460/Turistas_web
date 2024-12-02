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

  <!-- Contenedor de los hoteles con Grid para las filas de 3 en 3 -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6">
    @foreach ($hoteles as $hotel)  <!-- Comienza el bucle para mostrar los hoteles -->
    <div class="max-w-sm my-3 mx-5 bg-white rounded-lg shadow-lg overflow-hidden">
      <div class="bg-blue-500 text-white px-6 py-4">
        <h2 class="text-xl font-bold">{{ $hotel->hotel }}</h2> <!-- Nombre del hotel -->
        <p class="text-sm">Ubicación: {{ $hotel->ubicacion }}</p> <!-- Ubicación del hotel -->
      </div>
      <div class="p-6">
        <p class="text-gray-700"><strong>Check-in:</strong> {{ $hotel->checkin }} <!-- Check-in del hotel --></p>
        <p class="text-gray-700"><strong>Check-out:</strong> {{ $hotel->checkout }} <!-- Check-out del hotel --></p>
        <p class="text-gray-700"><strong>Habitaciones:</strong> {{ $hotel->nohabitaciones }}</p> <!-- Número de habitaciones -->
        <p class="text-gray-700"><strong>Categoría Estrellas:</strong> {{ $hotel->calificacion_estrellas }}</p> <!-- Calificación del hotel -->
        <div class="mt-4 flex justify-between">
          <button id="openModal{{ $hotel->id }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg text-sm">
            Editar
          </button>

          <form method="POST" action="{{ route('hotelA.destroy', $hotel->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar este hotel?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-sm">
              Eliminar
            </button>
          </form>
        </div>
      </div>

      <!-- Modal de edición (para cada hotel) -->
      <div id="editModal{{ $hotel->id }}" class="fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96 lg:w-1/3 xl:w-1/4">
          <h3 class="text-xl font-semibold text-gray-800">Editar Hotel: {{ $hotel->hotel }}</h3>

          <form action="{{ route('hotelA.update', $hotel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
              <label for="hotel" class="block text-sm font-medium text-gray-700">Nombre del hotel</label>
              <input type="text" id="hotel" name="hotel" value="{{ $hotel->hotel }}"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
              <small>{{$errors->first('hotel')}}</small>
            </div>

            <div>
              <label for="no_habitaciones" class="block text-sm font-medium text-gray-700">Número de habitaciones</label>
              <input type="number" id="no_habitaciones" name="no_habitaciones" value="{{ $hotel->nohabitaciones }}"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
              <small>{{$errors->first('no_habitaciones')}}</small>
            </div>

            <div>
              <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación (Opcional)</label>
              <input type="number" id="calificacion" name="calificacion" value="{{ $hotel->calificacion }}"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
              <small>{{$errors->first('calificacion')}}</small>
            </div>

            <div>
              <label for="precio" class="block text-sm font-medium text-gray-700">Precio por noche (USD)</label>
              <input type="number" id="precio" name="precio" value="{{ $hotel->precio }}"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
              <small>{{$errors->first('precio')}}</small>
            </div>

            <div>
              <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación</label>
              <input type="text" id="ubicacion" name="ubicacion" value="{{ $hotel->ubicacion }}"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
              <small>{{$errors->first('ubicacion')}}</small>
            </div>

            <div>
              <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
              <textarea id="descripcion" name="descripcion"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">{{ $hotel->descripcion }}</textarea>
              <small>{{$errors->first('descripcion')}}</small>
            </div>

            <div>
              <label for="politicas_cancelacion" class="block text-sm font-medium text-gray-700">Políticas de cancelación (Opcional)</label>
              <textarea id="politicas_cancelacion" name="politicas_cancelacion"
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">{{ $hotel->politicas_cancelacion }}</textarea>
              <small>{{$errors->first('politicas_cancelacion')}}</small>
            </div>

            <div class="mt-6 flex justify-between">
              <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Actualizar Hotel
              </button>
              <button id="closeModal{{ $hotel->id }}" type="button"
                class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-sm">
                Cancelar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endforeach  <!-- Fin del bucle -->
  </div>

  <x-footer></x-footer>

  <script>
    @foreach ($hoteles as $hotel)
      document.getElementById('openModal{{ $hotel->id }}').addEventListener('click', function () {
        document.getElementById('editModal{{ $hotel->id }}').classList.remove('hidden');
      });

      document.getElementById('closeModal{{ $hotel->id }}').addEventListener('click', function () {
        document.getElementById('editModal{{ $hotel->id }}').classList.add('hidden');
      });
    @endforeach
  </script>
</x-app-layout>
