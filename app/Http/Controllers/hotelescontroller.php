<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrarHotel;

class hotelescontroller extends Controller
{
    public function RegistrarHotel()
    {
        return view('registroHoteles');
    }

    public function ConsultarHotel() {

        return view('consultarHotel');
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
        'nombreHotel' => 'required|string|max:255',
        'categoria' => 'required|in:Economico,Medio,Lujo',
        'precio' => 'required|numeric|min:0',
        'servicios' => 'required|string',
        'distancia' => 'required|numeric|min:0',
        'estrellas' => 'required|integer|between:1,5',]);

        $hotel = $peticion->input('nombreHotel');
        
            session()->flash('exito', 'Todo correcto: ' . $hotel . ' Hotel guardado');


            
            return redirect('consultaHoteles');
    
        
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
