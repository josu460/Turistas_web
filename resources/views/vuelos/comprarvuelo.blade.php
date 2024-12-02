<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="container mx-auto p-4">
            <h2 class="text-lg font-bold mb-4">Comprar Vuelo - {{ $vuelo->destino->lugar }}</h2>

            <form action="{{ route('reservacion.store') }}" method="POST" id="compraVueloForm-{{ $vuelo->id }}" class="space-y-6">
                @csrf
                <!-- Información básica del vuelo -->
                <input type="hidden" name="vuelo_id" value="{{ $vuelo->id }}">
                <input type="hidden" name="destino" value="{{ $vuelo->destino->lugar }}">
                <input type="hidden" name="salida" value="{{ $vuelo->origen->lugar }}">
                <input type="hidden" name="fecha_ida" value="{{ $vuelo->fechasalida }}">
                <input type="hidden" name="fecha_vuelta" value="{{ $vuelo->fecharegreso }}">

                <h3 class="text-sm text-gray-700">Origen: {{ $vuelo->origen->lugar }} - Destino: {{ $vuelo->destino->lugar }}</h3>
                <h4 class="text-sm text-gray-700">Fecha de salida: {{ $vuelo->fechasalida }}</h4>
                <h4 class="text-sm text-gray-700">Fecha de regreso: {{ $vuelo->fecharegreso }}</h4>

                <!-- Cantidad de pasajeros -->
                <div>
                    <label for="cantidad_pasajeros-{{ $vuelo->id }}" class="block text-sm font-medium text-gray-700">Número de pasajeros</label>
                    <input type="number" id="cantidad_pasajeros-{{ $vuelo->id }}" name="cantidad_pasajeros" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800" min="1" max="10" required>
                </div>

                <!-- Selección de asientos -->
                <div id="contenedor-asientos-{{ $vuelo->id }}" class="grid grid-cols-6 gap-2">
                    @foreach ($vuelo->asientos as $asiento)
                        <button type="button" 
                                class="asiento bg-gray-300 hover:bg-blue-500 rounded-lg p-2 text-center"
                                data-asiento="{{ $asiento }}"
                                onclick="seleccionarAsiento('{{ $vuelo->id }}', '{{ $asiento }}')">
                            {{ $asiento }}
                        </button>
                    @endforeach
                </div>

                <button type="submit" class="w-full py-2 px-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg focus:outline-none">
                   Hacer reservación de Vuelo
                </button>
            </form>
        </div>
    </div>

    <script>
        // Manejar el cambio en el número de pasajeros
        document.querySelectorAll('[id^="cantidad_pasajeros"]').forEach(input => {
            input.addEventListener('input', function () {
                const vueloId = this.id.split('-')[1];
                const cantidad = parseInt(this.value) || 0; // Evitar errores si el campo está vacío
                const contenedorAsientos = document.getElementById('contenedor-asientos-' + vueloId);

                // Resetear selección previa si el número de pasajeros cambia
                const botonesSeleccionados = contenedorAsientos.querySelectorAll('.asiento.selected');
                if (botonesSeleccionados.length > cantidad) {
                    botonesSeleccionados.forEach(boton => {
                        boton.classList.remove('selected', 'bg-blue-500');
                        boton.classList.add('bg-gray-300');
                    });
                }
            });
        });

        // Función para manejar la selección de asientos
        function seleccionarAsiento(vueloId, asiento) {
            const contenedorAsientos = document.getElementById('contenedor-asientos-' + vueloId);
            const boton = document.querySelector(`[data-asiento="${asiento}"]`);
            const cantidadPasajeros = parseInt(document.getElementById(`cantidad_pasajeros-${vueloId}`).value) || 0;

            // Contar asientos seleccionados
            const asientosSeleccionados = contenedorAsientos.querySelectorAll('.asiento.selected').length;

            // Si el botón está seleccionado, deseleccionar
            if (boton.classList.contains('selected')) {
                boton.classList.remove('selected', 'bg-blue-500');
                boton.classList.add('bg-gray-300');
            } else {
                // Si no está seleccionado, verificar el límite antes de seleccionar
                if (asientosSeleccionados < cantidadPasajeros) {
                    boton.classList.remove('bg-gray-300');
                    boton.classList.add('selected', 'bg-blue-500');
                } else {
                    alert(`Solo puedes seleccionar ${cantidadPasajeros} asiento(s).`);
                }
            }

            // Actualizar campos ocultos con los asientos seleccionados
            const seleccionados = contenedorAsientos.querySelectorAll('.asiento.selected');
            document.querySelectorAll(`input[name="asientos_seleccionados[]"]`).forEach(input => input.remove()); // Limpiar inputs previos
            seleccionados.forEach(botonSeleccionado => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'asientos_seleccionados[]';
                input.value = botonSeleccionado.getAttribute('data-asiento');
                document.getElementById(`compraVueloForm-${vueloId}`).appendChild(input);
            });
        }
    </script>

    <x-Footer> </x-Footer>
</x-app-layout>
