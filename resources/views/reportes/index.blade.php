<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col">
        <div class="container mx-auto px-4 py-8 flex-grow">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-500">Reportes Generales</h1>
            <div class="mb-10"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tarjeta Reporte Reservaciones -->
                <!--
                <div class="flex flex-col items-center bg-yellow-200 p-8 rounded-lg shadow-md hover:bg-yellow-300 transition">
                    <svg class="w-16 h-16 text-yellow-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-xl font-semibold">Reporte Reservaciones</h2>
                    <div class="flex space-x-4 mt-4">
                        <a href="{{ route('reportes.reservaciones.excel') }}" class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-lg text-sm px-5 py-2.5">Excel</a>
                        <a href="{{ route('reportes.reservaciones.pdf') }}" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-4 py-2">PDF</a>
                    </div>
                </div>
                -->

                <!-- Tarjeta Reporte Aviones -->
                <div class="flex flex-col items-center bg-blue-200 p-8 rounded-lg shadow-md hover:bg-blue-300 transition">
                    <svg class="w-16 h-16 text-blue-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 18-7 3 7-18 7 18-7-3Zm0 0v-5"/>
                    </svg>
                    <h2 class="text-xl font-semibold">Reporte Aviones</h2>
                    <div class="flex space-x-4 mt-4">
                        <a href="{{ route('reportes.vuelos.excel') }}" class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-lg text-sm px-5 py-2.5">Excel</a>
                        <a href="{{ route('reportes.vuelos.pdf') }}" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-4 py-2">PDF</a>
                    </div>
                </div>

                <!-- Tarjeta Reporte Hoteles -->
                <div class="flex flex-col items-center bg-green-200 p-8 rounded-lg shadow-md hover:bg-green-300 transition">
                    <svg class="w-16 h-16 text-green-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 17v2M12 5.5V10m-6 7v2m15-2v-4c0-1.6569-1.3431-3-3-3H6c-1.65685 0-3 1.3431-3 3v4h18Zm-2-7V8c0-1.65685-1.3431-3-3-3H8C6.34315 5 5 6.34315 5 8v2h14Z"/>
                    </svg>
                    <h2 class="text-xl font-semibold">Reporte Hoteles</h2>
                    <div class="flex space-x-4 mt-4">
                        <a href="{{ route('reportes.hoteles.excel') }}" class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-lg text-sm px-5 py-2.5">Excel</a>
                        <a href="{{ route('reportes.hoteles.pdf') }}" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-4 py-2">PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-Footer> </x-Footer>
</x-app-layout>
