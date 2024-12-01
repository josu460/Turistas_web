<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Vuelos</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Arial&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('{{ asset("img/viajera.webp") }}');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="bg-transparent p-5 flex justify-between items-center">
        <div class="text-3xl font-bold">
            <span class="text-red-600"></span><span class="text-yellow-400">Turista sin Maps</span>
        </div>
        <div class="flex space-x-8">
            @guest
                <a href="{{ route('login') }}" class="text-black text-lg font-semibold hover:text-yellow-400 transition duration-300">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="text-black text-lg font-semibold hover:text-yellow-400 transition duration-300">Registrarse</a>
            @else
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white text-lg font-semibold hover:text-yellow-400 transition duration-300">Cerrar sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </nav>

    <!-- Contenedor de las tarjetas -->
    <div class="container mx-auto mt-12 text-center">
        <!-- Título con fondo oscuro -->
        <div class="inline-block bg-black bg-opacity-60 px-6 py-4 rounded-lg mb-8">
            <h1 class="text-4xl font-bold text-white">Descubre los mejores destinos</h1>
        </div>

        <!-- Tarjetas de destinos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Tarjeta 1 -->
            <div class="max-w-xs mx-auto">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/paisaje 1.jpg') }}" class="w-full h-56 object-cover" alt="Paisaje 1">
                    <div class="bg-black bg-opacity-70 p-4 rounded-b-lg">
                        <h5 class="text-xl font-bold text-yellow-400">Montañas Mágicas</h5>
                        <p class="text-white">Visita las montañas más impresionantes del mundo. Un paraíso para los amantes de la naturaleza.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="max-w-xs mx-auto">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/paisaje 2.jpg') }}" class="w-full h-56 object-cover" alt="Paisaje 2">
                    <div class="bg-black bg-opacity-70 p-4 rounded-b-lg">
                        <h5 class="text-xl font-bold text-yellow-400">Playas del Caribe</h5>
                        <p class="text-white">Relájate en las playas más hermosas del Caribe, rodeado de aguas cristalinas y arena blanca.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="max-w-xs mx-auto">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/paisaje 3.jpg') }}" class="w-full h-56 object-cover" alt="Paisaje 3">
                    <div class="bg-black bg-opacity-70 p-4 rounded-b-lg">
                        <h5 class="text-xl font-bold text-yellow-400">Desierto Dorado</h5>
                        <p class="text-white">Explora la belleza de los desiertos, con paisajes únicos que nunca olvidarás.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Tailwind (solo si necesitas algún script adicional) -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.js"></script>
</body>
</html>
