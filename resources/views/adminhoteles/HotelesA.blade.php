<x-app-layout>
  <div class="bg-blue-500 text-white py-8 px-4">
    <h1 class="text-2xl font-bold text-center">Admnistrar Hoteles</h1>
  </div>

  <div class="flex justify-end mt-4"> <!-- Div 1 -->
    
    <!-- Botón para abrir el modal -->
    <button data-modal-target="crearLugar-modal" data-modal-toggle="crearLugar-modal"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-full mr-5" type="button">
      Agregar Lugar
    </button>

    <!-- Modal para agregar un lugar -->
    <div id="crearLugar-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full"><!-- Div despúes de Modal para agregar un lugar -->
         
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
          </div><!-- Fin Cuerpo del modal con el formulario -->

        </div><!-- Fin Contenido del modal -->

      </div><!-- Fin Div despúes de Modal para agregar un lugar -->
    </div><!-- Fin Modal para agregar un lugar -->

    <!-- Modal toggle button -->
    <button data-modal-target="crearhotel-modal" data-modal-toggle="crearhotel-modal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 mr-4 rounded-full" type="button">
      Agregar Hotel
    </button>

    <!-- Main modal -->
    <div id="crearhotel-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->                
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex  items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Registrar Hotel
            </h3>
            <button data-modal-hide="crearhotel-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span data-modal-hide="crearhotel-modal" class="sr-only">Close modal</span>
            </button>
          </div>
          
          <!-- Modal body with form -->
          <div class="p-4 md:p-5 space-y-4">
            <form action="{{ route('hotelA.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
              @csrf
              <div>
                <label for="hotel" class="block text-sm font-medium text-gray-700">Nombre del hotel</label>
                <input type="text" id="hotel" name="hotel"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: Hotel Paradise">
                <small>{{$errors->first('hotel')}}</small>
              </div>

              <div class="col-span-1">
                <label for="checkin" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Entrada</label>
                <input type="date" id="checkin" name="checkin" class="w-full p-2.5 border border-gray-300 rounded-lg">
                <small>{{$errors->first('fecharegreso')}}</small>
              </div>

              <div class="col-span-1">
                <label for="checkout" class="block mb-2 text-sm font-medium text-gray-700">Fecha de Salida</label>
                <input type="date" id="checkout" name="checkout" class="w-full p-2.5 border border-gray-300 rounded-lg">
                <small>{{$errors->first('fechasalida')}}</small>
              </div>

              <div>
                <label for="no_habitaciones" class="block text-sm font-medium text-gray-700">Número de habitaciones</label>
                <input type="number" id="no_habitaciones" name="no_habitaciones" min="1"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: 10">
                <small>{{$errors->first('no_habitaciones')}}</small>
              </div>

              <div>
                <label for="calificacion" class="block text-sm font-medium text-gray-700">Categoría de estrellas</label>
                <input type="number" id="calificacion" name="calificacion" min="1" max="5"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ejemplo: 4">
                <small>{{$errors->first('calificacion')}}</small>
              </div>

              <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio por noche:</label>
                <input type="number" id="precio" name="precio" min="0" step="0.01"
                  class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="120.00">
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
                <label for="id_origen" class="block text-sm font-medium text-gray-700">Destino donde se encuentra el hotel</label>
                <select id="id_origen" name="id_origen"
                  class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                  <option value="">Seleccione un lugar</option>
                  @if(isset($lugares))
                    @foreach($lugares as $lugar)
                      <option value="{{ $lugar->id }}">{{ $lugar->lugar }}</option>
                    @endforeach
                  @endif
                </select>
                <small>{{ $errors->first('id_origen') }}</small>
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
              
              <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Subir Imágenes</label>
                <input type="file" id="imagen" name="imagen" accept="image/*"
                  class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                <small class="text-red-500">{{ $errors->first('imagen') }}</small>
              </div>                                         

              <div class="text-center">
                <button type="submit" class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                  Crear
                 </button>
                 <button data-modal-hide="crearhotel-modal" type="button" class="py-2 px-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                  Cancelar
                 </button>
              </div>
            </form>
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
        
    </div><!-- Fin Main modal -->
    
    <!-- Enlace para consultar los hoteles -->
    <a href="{{route('hotelA.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded-full mr-5" type="button">
      Consultar Hoteles
    </a>
    
    
  </div><!-- Fin Div 1 -->

  <!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Si hay errores, forzar la apertura del modal
      @if ($errors->any())
        const modal = document.querySelector('#crearhotel-modal');
        modal.classList.remove('hidden'); // Asegúrate de que esto funcione con tu framework/modals
        modal.classList.add('visible');
      @endif
    });
  </script> -->


  <x-Footer> </x-Footer>
</x-app-layout>