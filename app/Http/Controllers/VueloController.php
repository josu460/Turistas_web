<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use App\Models\Aerolinea;
use App\Models\Lugar;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $vuelos = Vuelo::all();
        $aerolineas = Aerolinea::all();
        $lugars = Lugar::all();
        return view('adminvuelos.VuelosA', compact('aerolineas', 'lugars', 'vuelos'));
    }


    public function otraVista(Request $request)
    {
        // Inicializar la consulta para los vuelos
        $vuelos = Vuelo::query();
        $aerolineas = Aerolinea::all();
        $lugares = Lugar::all();

        if (!$request->isMethod('POST')) {

            $resultados = $vuelos->get();
        } else {
        }

        // Generar asientos para cada vuelo
        foreach ($resultados as $vuelo) {
            $vuelo->asientos = $this->generarAsientos($vuelo->numeroasientos);
        }

        // Pasar los resultados, aerolíneas y lugares a la vista
        return view('vuelos.Vuelosu', compact('resultados', 'aerolineas', 'lugares'));
    }


    private function generarAsientos($totalAsientos)
    {
        $asientos = [];
        $filas = ceil($totalAsientos / 4); // Suponiendo 4 columnas por fila

        for ($fila = 1; $fila <= $filas; $fila++) {
            for ($columna = 1; $columna <= 4; $columna++) {
                $numeroAsiento = (($fila - 1) * 4) + $columna;
                if ($numeroAsiento <= $totalAsientos) {
                    $asientos[] = chr(64 + $fila) . $columna; // Ejemplo: A1, A2, etc.
                }
            }
        }

        return $asientos;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los lugares que pueden ser origen o destino
        $lugares = Lugar::all(); // Todos los lugares disponibles para origen y destino

        // Obtener todas las aerolíneas
        $aerolineas = Aerolinea::all();

        return view('adminvuelos.VuelosA', compact('aerolineas', 'lugares'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $validatedData = $request->validate([
            'novuelo' => 'required|string|max:10',
            'fechasalida' => 'required|date',
            'fecharegreso' => 'nullable|date|after_or_equal:fechasalida',
            'precio' => 'required|numeric|min:0',
            'hora' => 'required|string',
            'duracion' => 'required|string',
            'numeroasientos' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_aerolinea' => 'required|exists:aerolineas,id',
            'id_origen' => 'required|exists:lugares,id',  // Validación para origen
            'id_destino' => 'required|exists:lugares,id',
        ]);

        // Manejar la imagen si fue subida
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('vuelos', 'public');  // Guardar en public/storage/vuelos
            $validatedData['imagen'] = $imagePath;  // Agregar la ruta de la imagen al array de datos
        }

        // Crear el vuelo con los datos validados (incluida la imagen si existe)
        Vuelo::create($validatedData);

        session()->flash('exito', 'Vuelo creado correctamente.');
        return redirect()->route('vuelos.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Vuelo $vuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vuelo = Vuelo::findOrFail($id);
        $aerolineas = Aerolinea::all();
        $lugares = Lugar::all();  // Asegúrate de que esta línea cargue los lugares correctamente

        return view('vuelos.edit', compact('vuelo', 'aerolineas', 'lugares'));
    }






    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_vuelo)
    {
        
        // Encuentra el vuelo por su ID
        $vuelo = Vuelo::findOrFail($id_vuelo);

        // Valida los datos de entrada
        $validatedData = $request->validate([
            'id_aerolinea' => 'required|exists:aerolineas,id',
            'id_origen' => 'required|exists:lugares,id',
            'id_destino' => 'required|exists:lugares,id|different:id_origen',
            'novuelo' => 'required|string|max:10',
            'fechasalida' => 'required|date',
            'fecharegreso' => 'nullable|date|after_or_equal:fechasalida',
            'precio' => 'required|numeric|min:0',
            'hora' => 'required|string',
            'duracion' => 'required|string',
            'numeroasientos' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Actualiza el vuelo con los nuevos datos
        $vuelo->update([
            'novuelo' => $request->input('novuelo'),
            'fechasalida' => $request->input('fechasalida'),
            'fecharegreso' => $request->input('fecharegreso'),
            'precio' => $request->input('precio'),
            'hora' => $request->input('hora'),
            'duracion' => $request->input('duracion'),
            'numeroasientos' => $request->input('numeroasientos'),
            'id_aerolinea' =>  $request->input('id_aerolinea'),
            'id_origen' =>  $request->input('id_origen'),
            'id_destino' =>  $request->input('id_destino'),
        ]);


        if ($request->hasFile('imagen')) {

            $imagePath = $request->file('imagen')->store('imagenes', 'public');
            $vuelo->update(['imagen' => $imagePath]);
        }

        session()->flash('yes', 'Vuelo Actualizado correctamente.');
        return redirect()->route('vuelos.index');
    }


    public function buscarVuelo(Request $request)
    {
        session()->flash('loading', 'Buscando vuelos....');
        // Validación de datos
        $validatedData = $request->validate([
            'aerolinea' => 'nullable|string|max:255',
            'escala' => 'nullable|in:noescala,siescala',
            'hora' => 'nullable|integer|min:0|max:23',
            'tarifa' => 'nullable|in:premium,flex,superflex',
            'origen' => 'nullable|string|max:255',
            'destino' => 'nullable|string|max:255|different:origen',
            'fecha_despegue' => 'nullable|date|after_or_equal:today',
            'fecha_regreso' => 'nullable|date|after_or_equal:fecha_despegue',
        ]);

        // Inicializar la consulta para los vuelos
        $vuelos = Vuelo::query();
        $aerolineas = Aerolinea::all();
        $lugares = Lugar::all();

        // Si no se envió el formulario, cargar todos los vuelos sin filtro
        if (!$request->isMethod('POST')) {
            $resultados = $vuelos->get();
        } else {
            // Aplicar filtros si el formulario fue enviado

            // Filtrar por aerolínea
            if (!empty($validatedData['aerolinea'])) {
                $vuelos->whereHas('aerolinea', function ($query) use ($validatedData) {
                    $query->where('aerolinea', 'LIKE', '%' . $validatedData['aerolinea'] . '%');
                });
            }

            // Filtrar por origen
            if (!empty($validatedData['origen'])) {
                $vuelos->whereHas('origen', function ($query) use ($validatedData) {
                    $query->where('lugar', 'LIKE', '%' . $validatedData['origen'] . '%');
                });
            }

            // Filtrar por destino
            if (!empty($validatedData['destino'])) {
                $vuelos->whereHas('destino', function ($query) use ($validatedData) {
                    $query->where('lugar', 'LIKE', '%' . $validatedData['destino'] . '%');
                });
            }

            // Filtrar por tarifa
            if (!empty($validatedData['tarifa'])) {
                switch ($validatedData['tarifa']) {
                    case 'premium':
                        $vuelos->where('precio', '>', 10000);
                        break;
                    case 'flex':
                        $vuelos->whereBetween('precio', [5000, 10000]);
                        break;
                    case 'superflex':
                        $vuelos->where('precio', '<', 5000);
                        break;
                }
            }

            // Filtrar por fecha de despegue
            if (!empty($validatedData['fecha_despegue'])) {
                $vuelos->whereDate('fechasalida', $validatedData['fecha_despegue']);
            }

            // Filtrar por escala
            if (!empty($validatedData['escala'])) {
                $vuelos->where('escala', $validatedData['escala']);
            }

            // Filtrar por fecha de regreso
            if (!empty($validatedData['fecha_regreso'])) {
                $vuelos->whereDate('fecharegreso', $validatedData['fecha_regreso']);
            }

            // Filtrar por hora
            if (!empty($validatedData['hora'])) {
                $vuelos->where('hora', $validatedData['hora']);
            }

            // Obtener los resultados filtrados
            $resultados = $vuelos->get();
        }

        // Asegurarse de que todos los vuelos tengan asientos generados
        foreach ($resultados as $vuelo) {
            if (empty($vuelo->asientos)) {
                $vuelo->asientos = $this->generarAsientos($vuelo->numeroasientos ?? 0);
            }
        }

        // Si no hay resultados, mostrar un mensaje
        if ($resultados->isEmpty()) {
            session()->flash('message', 'No se encontraron vuelos.');
        }

        // Pasar los resultados a la vista
        return view('vuelos.Vuelosu', compact('resultados', 'aerolineas', 'lugares'));
    }
}
