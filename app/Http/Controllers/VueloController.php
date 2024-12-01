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
        $vuelos = Vuelo::all(); // Obtén todos los vuelos
        $aerolineas = Aerolinea::all(); // Obtén todas las aerolíneas
        $lugars = Lugar::all(); // Obtén todos los lugares
        return view('adminvuelos.VuelosA', compact('aerolineas', 'lugars','vuelos'));
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
            'id_origen' => 'required|exists:lugars,id',
            'id_destino' => 'required|exists:lugars,id',
            // Agrega más validaciones si es necesario
        ]);
    
        // Actualiza el vuelo con los nuevos datos
        $vuelo->update([
            'aerolinea_id' => $request->input('id_aerolinea'),
            'origen_id' => $request->input('id_origen'),
            'destino_id' => $request->input('id_destino'),
            'novuelo' => $request->input('novuelo'),
            'fechasalida' => $request->input('fechasalida'),
            'fecharegreso' => $request->input('fecharegreso'),
            'precio' => $request->input('precio'),
            'hora' => $request->input('hora'),
            'duracion' => $request->input('duracion'),
            'numeroasientos' => $request->input('numeroasientos'),
            'imagen' => $request->file('imagen') ? $request->file('imagen')->store('imagenes') : $vuelo->imagen,
            'id_aerolinea' =>  $request->input('id_aerolinea'),
            'id_origen' =>  $request->input('id_origen'), 
            'id_destino' =>  $request->input('id_destino'),
        ]);
    
        // Mensaje de éxito
        session()->flash('actualizado', 'Se actualizó el vuelo con la aerolínea ' . $vuelo->aerolinea->aerolinea);
    
        // Redirige al índice de vuelos
        return redirect()->route('vuelos.index');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo)
    {
        $vuelo = Vuelo::findOrFail($vuelo->id);
        $vuelo->delete();
        session()->flash('eliminado', 'Vuelo eliminado correctamente.');
        return redirect()->route('vuelos.index');
    }
}
