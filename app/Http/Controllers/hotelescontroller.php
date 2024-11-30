<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrarHotel;

class hotelescontroller extends Controller
{
    public function RegistrarHotel()
    {
        return view('adminhoteles.HotelesA');
    }

    public function ConsultarHotel()
    {
        return view('adminhoteles.consultaH');
    }
    

    public function inicio() {

        return view('home');
    }

    public function ConsultarUsuario(){

        return view('ConsultarUsuario');
    }

    public function index(){
        return view('hoteles.hotelesu');
    }


    

    public function addHoteles(RegistrarHotel $peticion) 
    {
        $validacion = $peticion->validate([    
            'hotel' => 'required|string|max:255',
            'no_habitaciones' => 'required|integer|min:1',
            'calificacion' => 'nullable|integer|between:1,5',
            'precio' => 'required|numeric|min:0',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'politicas_cancelacion' => 'nullable|string',]);

        $hotel = $peticion->input('hotel');
        
            session()->flash('exito', 'Todo correcto: ' . $hotel . ' Hotel guardado');


            
            return redirect('consultaH');
    
        
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
