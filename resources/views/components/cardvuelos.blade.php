@props(['vuelo','aerolineas','lugares'])
<div class="max-w-sm mx-auto mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-20 md:w-80 md:rounded-none md:rounded-l-lg"
        src="{{ asset('storage/' . $vuelo->imagen) }}" alt="Imagen usuarios">
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                Vuela a {{ $vuelo->destino->lugar }}
            </h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
            <strong>Fecha de salida:</strong> {{ $vuelo->fechasalida }}
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
            <strong>Sal desde:</strong> {{ $vuelo->origen->lugar }}
        </p>
        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400 text-center">
            <strong>Precio por boleto:</strong> ${{ number_format($vuelo->precio, 2) }}
        </p>
        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400 text-center">
            <strong>Horario de salida:</strong> {{ $vuelo->hora }} hrs
        </p>
        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400 text-center">
            <strong>Numero de vuelo:</strong> {{ $vuelo->novuelo }}
        </p>

        <!-- Modal toggle -->
        <div class="flex justify-center">
            <button data-modal-target="vuelo-modal-{{ $vuelo->id }}" data-modal-toggle="vuelo-modal-{{ $vuelo->id }}" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5" type="button">
                Adquirir Vuelo
            </button>
        </div>

        <!-- Modal único para cada vuelo -->
        <div id="vuelo-modal-{{ $vuelo->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Adquirir Vuelo
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="vuelo-modal-{{ $vuelo->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Formulario -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="/comprarVuelo" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label for="destino" class="block text-sm font-medium text-gray-700">Destino</label>
                                <input type="text" id="destino" name="destino" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800" value="{{ $vuelo->destino->lugar }}" required>
                            </div>
                            <div>
                                <label for="salida" class="block text-sm font-medium text-gray-700">Punto de partida</label>
                                <input type="text" id="salida" name="salida" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800" value="{{ $vuelo->origen->lugar }}" required>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="fecha_ida" class="block text-sm font-medium text-gray-700">Fecha de ida</label>
                                    <input type="date" id="fecha_ida" name="fecha_ida" class="w-full p-2.5 border border-gray-300 rounded-lg" value="{{ $vuelo->fechasalida }}" readonly required>
                                </div>
                                <div>
                                    <label for="fecha_vuelta" class="block text-sm font-medium text-gray-700">Fecha de vuelta</label>
                                    <input type="date" id="fecha_vuelta" name="fecha_vuelta" class="w-full p-2.5 border border-gray-300 rounded-lg" value="{{ $vuelo->fecharegreso }}" readonly required>
                                </div>
                            </div>

                            <!-- Selección de Asiento -->
                            <div>
                                <label for="asiento" class="block text-sm font-medium text-gray-700">Selecciona tu asiento</label>
                                <div class="grid grid-cols-4 gap-2 mt-2">
                                    @foreach ($vuelo->asientos as $asiento)
                                    <button type="button" class="asiento bg-gray-300 hover:bg-blue-500 rounded-lg p-2" data-asiento="{{ $asiento }}" data-vuelo-id="{{ $vuelo->id }}">{{ $asiento }}</button>
                                    @endforeach
                                </div>
                                <input type="hidden" id="asientoSeleccionado-{{ $vuelo->id }}" name="asientoSeleccionado" required>
                            </div>

                            <button type="submit" class="w-full py-2 px-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg focus:outline-none">
                                Confirmar Vuelo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.asiento').forEach(button => {
        button.addEventListener('click', function() {
            const vueloId = this.getAttribute('data-vuelo-id'); // Obtener el ID del vuelo directamente desde el botón
            const asientoSeleccionado = this.getAttribute('data-asiento'); // Obtener el código del asiento

            // Limpiar selección de otros botones
            document.querySelectorAll(`#vuelo-modal-${vueloId} .asiento`).forEach(btn => {
                btn.classList.remove('bg-blue-500', 'text-white');
            });

            // Marcar el asiento seleccionado
            this.classList.add('bg-blue-500', 'text-white');

            // Actualizar el valor del input con el asiento seleccionado
            document.getElementById(`asientoSeleccionado-${vueloId}`).value = asientoSeleccionado;

            // Deshabilitar la selección de más asientos, excepto el seleccionado
            document.querySelectorAll(`#vuelo-modal-${vueloId} .asiento`).forEach(btn => {
                if (btn !== this) { // Solo deshabilitar los otros botones
                    btn.disabled = true; // Deshabilitar otros botones
                }
            });
        });
    });
</script>

@if (session('exito'))
@session('exito')
<script>
    Swal.fire({
        title: "Todo correcto",
        text: " {{$value}}",
        icon: "success"
    });
</script>
@endsession
@endif