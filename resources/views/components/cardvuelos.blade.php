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
            <strong>Aerolinea:</strong> {{ $vuelo->aerolinea->aerolinea }}
        </p>
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
            <strong>Escala:</strong> {{ $vuelo->escala }}
        </p>
        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400 text-center">
            <strong>Numero de vuelo:</strong> {{ $vuelo->novuelo }}
        </p>

        <div class="flex justify-center mt-4">
            <a href="{{ route('comprar.vuelo', ['vuelo' => $vuelo->id]) }}" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Adquirir Vuelo
            </a>
        </div>
    </div>
</div>

