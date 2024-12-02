<?php

namespace App\Http\Controllers;

use App\Models\Aerolinea;
use Illuminate\Http\Request;

class AerolineaController extends Controller
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
        $aerolineas = Aerolinea::all(); // Obtiene todas las aerolíneas
        return view('crearVuelo', compact('aerolineas')); // Envía a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addaerolinea = new Aerolinea();
        $addaerolinea->aerolinea = $request->input('aerolinea');
        $addaerolinea->save();

        session()->flash('yeah','Se agrego correctamente la aerolinea');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Aerolinea $aerolinea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aerolinea $aerolinea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aerolinea $aerolinea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aerolinea $aerolinea)
    {
        //
    }
}
