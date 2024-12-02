
<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-lg font-bold mb-4">Mis Reservaciones</h2>

        @if($reservaciones->isEmpty())
            <p class="text-gray-600">No tienes reservaciones.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">Vuelo</th>
                        <th class="px-4 py-2 text-left">Fecha de Salida</th>
                        <th class="px-4 py-2 text-left">Fecha de Regreso</th>
                        <th class="px-4 py-2 text-left">Pasajeros</th>
                        <th class="px-4 py-2 text-left">Asientos</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservaciones as $reservacion)
                        <tr>
                            <td class="px-4 py-2">{{ $reservacion->vuelo->destino->lugar }}</td>
                            <td class="px-4 py-2">{{ $reservacion->fecha_ida }}</td>
                            <td class="px-4 py-2">{{ $reservacion->fecha_vuelta }}</td>
                            <td class="px-4 py-2">{{ $reservacion->cantidad_pasajeros }}</td>
                            <td class="px-4 py-2">{{ implode(', ', explode(',', $reservacion->asientos)) }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('reservacion.show', $reservacion->id) }}" class="text-blue-500 hover:text-blue-700">Ver detalles</a>
                                <!-- Agrega más opciones como editar o cancelar si lo deseas -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
