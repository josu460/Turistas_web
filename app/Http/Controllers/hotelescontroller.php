<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Requests\RegistrarHotel;

class hotelescontroller extends Controller
{
  /**
  * Display a listing of the resource.
  */
  public function index()
  {
    // Consulta todos los hoteles
    $hoteles = Hotel::all();

    // Retorna la vista junto con los datos
    return view('adminhoteles.consultaH', compact('hoteles'));
  }

  public function RegistrarHotel()
  {
    return view('adminhoteles.HotelesA');
  }

  public function ConsultarHotel()
  {
    return view('adminhoteles.consultaH');
  }

  public function inicio()
  {
    return view('home');
  }

  public function ConsultarUsuario()
  {
    return view('ConsultarUsuario');
  }

  public function create()
  {
    return view('adminhoteles.HotelesA');
  }

  /**
  * Store a newly created resource in storage.
  */
  public function store(RegistrarHotel $peticion)
  {
    // Crear una nueva instancia del modelo Hotel
    $hotel = new Hotel();

    // Asignar los valores del formulario
    $hotel->hotel = $peticion->input('hotel');
    $hotel->checkin = $peticion->input('checkin');
    $hotel->checkout = $peticion->input('checkout');
    $hotel->nohabitaciones = $peticion->input('no_habitaciones');
    $hotel->calificacion_estrellas = $peticion->input('calificacion');
    $hotel->precio = $peticion->input('precio');
    $hotel->ubicacion = $peticion->input('ubicacion');
    $hotel->descripcion = $peticion->input('descripcion');
    $hotel->politicas_cancelacion = $peticion->input('politicas_cancelacion');

    // Guardar en la base de datos
    $hotel->save();

    $hotel = $peticion->input('hotel');

    session()->flash('exito', 'Todo correcto: ' . $hotel . ' Hotel guardado');

    return redirect()->route('hotelA.index')->with('exito', 'Hotel creado exitosamente.');
  }

  /**
  * Update the specified resource in storage.
  */
  public function update(Request $request, string $id)
  {
      $request->validate([
          'hotel' => 'required|string|max:255',
          'no_habitaciones' => 'required|integer',
          'calificacion' => 'nullable|integer|max:5',
          'precio' => 'nullable|numeric',
          'ubicacion' => 'required|string|max:255',
          'descripcion' => 'nullable|string',
          'politicas_cancelacion' => 'nullable|string',
      ]);
  
      $hotel = Hotel::findOrFail($id);
  
      // Actualización de cada campo por separado
      $hotel->hotel = $request->input('hotel');
      $hotel->nohabitaciones = $request->input('no_habitaciones');
      $hotel->calificacion_estrellas = $request->input('calificacion');
      $hotel->precio = $request->input('precio');
      $hotel->ubicacion = $request->input('ubicacion');
      $hotel->descripcion = $request->input('descripcion');
      $hotel->politicas_cancelacion = $request->input('politicas_cancelacion');

  
      // Guardar los cambios
      $hotel->save();
  
      return redirect()->route('hotelA.index')->with('exito', 'Hotel actualizado correctamente');
  }
  

  public function destroy(string $id)
  {
    $hotel = Hotel::findOrFail($id);
    $hotel->delete();

    return redirect()->route('hotelA.index')->with('exito', 'Hotel eliminado correctamente');
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
