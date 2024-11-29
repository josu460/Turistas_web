<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class avionescontroller extends Controller
{

    public function index()
    {
        return view('vuelos.Vuelosu');
    }

    public function ver()
    {
        return view('adminvuelos.VuelosA');
    }

    public function VuelosBuscar(Request $request)
    {
        $validacion = $request->validate([
            'tipo_viaje' => 'required',
            'pasajeros' => 'required',
            'clase' => 'required',
            'tarifa' => 'required',
            'origen' => 'required',
            'destino' => 'required',
            'fecha_despegue' => 'required',
            'fecha_regreso' => 'required',
        ]);


        session()->flash('loading', 'Busqueda de vuelo exitosa');
        return to_route('Vuelos');
    }


    public function CrearVuelos(Request $request)
    {
        $validacion = $request->validate([
            'nombreVuelo' => 'required',
            'salida' => 'required',
            'fecha_despegueV' => 'required',
            'fecha_regresoV' => 'required',
            'precio' => 'required',
            'vueloT' => 'required',
            'estrellas' => 'required',
        ]);
        session()->flash('exito', 'Vuelo creado exitosamente');
        return to_route('ConsultaVuelos');
    }

    public function EditarVuelos(Request $request)
    {
        $validacion = $request->validate([
            'nombreVuelo' => 'required',
            'salida' => 'required',
            'fecha_despegueV' => 'required',
            'fecha_regresoV' => 'required',
            'precio' => 'required',
            'vueloT' => 'required',
            'estrellas' => 'required',
        ]);
        session()->flash('exito', 'Vuelo Editado exitosamente');
        return to_route('ConsultaVuelos');
    }

    public function ComprarVuelo(Request $request)
    {
        $validacion = $request->validate([
            'destino' => 'required',
            'salida' => 'required',
            'fecha_ida' => 'required',
            'fecha_vuelta' => 'required',
            'asientoSeleccionado' => 'required',
        ]);
        session()->flash('exito', 'Vuelo comprado exitosamente');
        return to_route('ConsultaVuelos');
    }
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
