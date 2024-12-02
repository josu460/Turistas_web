<x-app-layout>
    
    <div class="container mx-auto p-4">
        <h2 class="text-lg font-bold mb-4">Comprar Vuelo</h2>

        <form action="{{ route('confirmar.vuelo') }}" method="POST" id="compraVueloForm" class="space-y-6">
            @csrf
            <!-- Información básica del vuelo -->
            <input type="hidden" name="vuelo_id" value="{{ $vuelo->id }}">
            <input type="hidden" name="destino" value="{{ $vuelo->destino->lugar }}">
            <input type="hidden" name="salida" value="{{ $vuelo->origen->lugar }}">
            <input type="hidden" name="fecha_ida" value="{{ $vuelo->fechasalida }}">
            <input type="hidden" name="fecha_vuelta" value="{{ $vuelo->fecharegreso }}">

            <!-- Cantidad de pasajeros -->
            <div>
                <label for="cantidad_pasajeros" class="block text-sm font-medium text-gray-700">Número de pasajeros</label>
                <input type="number" id="cantidad_pasajeros" name="cantidad_pasajeros" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800" min="1" max="10" required>
            </div>

            <!-- Selección de asientos -->
            <div id="contenedor-asientos" class="space-y-4">
                <!-- Asientos dinámicos generados por JS -->
            </div>

            <button type="submit" class="w-full py-2 px-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg focus:outline-none">
                Confirmar Vuelo
            </button>
        </form>
    </div>

    <script>
        document.getElementById('cantidad_pasajeros').addEventListener('input', function() {
            const cantidad = parseInt(this.value);
            const contenedorAsientos = document.getElementById('contenedor-asientos');
            contenedorAsientos.innerHTML = ''; // Limpiar contenido previo

            if (cantidad >= 1 && cantidad <= 10) {
                for (let i = 1; i <= cantidad; i++) {
                    contenedorAsientos.innerHTML += `
                    <div>
                        <label for="asiento-${i}" class="block text-sm font-medium text-gray-700">Asiento para pasajero ${i}</label>
                        <select id="asiento-${i}" name="asientos[]" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-800" required>
                            @foreach ($vuelo->asientos as $asiento)
                                <option value="{{ $asiento }}">{{ $asiento }}</option>
                            @endforeach
                        </select>
                    </div>
                `;
                }
            } else {
                alert("Por favor, selecciona un número válido de pasajeros (entre 1 y 10).");
            }
        });
    </script>

    <x-Footer> </x-Footer>
</x-app-layout>