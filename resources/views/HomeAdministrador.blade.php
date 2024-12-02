<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-10 text-blue-500 ">¡Bienvenido al Home Administrador!</h1>
        <div class="mb-10"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 ">
            <!-- Vuelos -->
            <a href="" class="flex flex-col items-center bg-blue-200 p-8 rounded-lg shadow-md mb-10 hover:bg-blue-300 transition">
                <svg class="w-16 h-16 text-blue-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 18-7 3 7-18 7 18-7-3Zm0 0v-5"/>
                </svg>
                <h2 class="text-xl font-semibold">Vuelos</h2>
            </a>

            <!-- Hoteles -->
            <a href="{{route('hotelA.create')}}" class="flex flex-col items-center bg-green-200 p-8 rounded-lg shadow-md mb-10 hover:bg-green-300 transition">
                <svg class="w-16 h-16 text-green-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 17v2M12 5.5V10m-6 7v2m15-2v-4c0-1.6569-1.3431-3-3-3H6c-1.65685 0-3 1.3431-3 3v4h18Zm-2-7V8c0-1.65685-1.3431-3-3-3H8C6.34315 5 5 6.34315 5 8v2h14Z"/>
                </svg>
                <h2 class="text-xl font-semibold">Hoteles</h2>
            </a>

            <!-- Usuarios -->
            <a href="" class="flex flex-col items-center bg-yellow-200 p-8 rounded-lg shadow-md mt-10 hover:bg-yellow-300 transition">
                <svg class="w-16 h-16 text-yellow-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-xl font-semibold">Usuarios</h2>
            </a>

            <!-- Reportes -->
            <a href="" class="flex flex-col items-center bg-red-200 p-8 rounded-lg shadow-md mt-10 hover:bg-red-300 transition">
                <svg class="w-16 h-16 text-red-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z"/>
                </svg>
                <h2 class="text-xl font-semibold">Reportes</h2>
            </a>
        </div>
    </div>
</div>
<x-Footer> </x-Footer>
</x-app-layout>
