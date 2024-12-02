<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $origenes = Lugar::where('tipo', 'origen')->get(); // Supongamos que los lugares tienen un tipo
        $destinos = Lugar::where('tipo', 'destino')->get();
    
        return view('crearVuelo', compact('origenes', 'destinos'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'lugar' => 'required|string|max:255|unique:lugares,lugar',
        ]);
    
        // Crear un nuevo registro en la tabla Lugares
        $addlugar = new Lugar();
        $addlugar->lugar = $request->input('lugar');
        $addlugar->save();
    
        // Mensaje de éxito
        session()->flash('corectou', 'Se agregó correctamente el lugar');
        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Lugar $lugar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lugar $lugar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lugar $lugar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        //
    }
}
