<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vuelo;



class ReservacionController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener las reservaciones del usuario logueado
        $reservaciones = Reservacion::where('id_users', Auth::id())->get();

        return view('reservacion.index', compact('reservaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();


        $validatedData = $request->validate([
            'id_vuelo' => 'required|exists:vuelos,id',
            'cantidad_pasajeros' => 'required|integer|min:1',
            'asientos_seleccionados' => 'required|array|min:1',
        ]);

        // Crear una nueva reservación para el usuario autenticado
        $reservacion = new Reservacion();
        $reservacion->id_vuelo = $request->id_vuelo; // Usar el nombre correcto de la columna en la base de datos
        $reservacion->id_users = $user->id;
        $reservacion->cantidad_pasajeros = $request->cantidad_pasajeros;
        $reservacion->asientos = implode(',', $request->asientos_seleccionados); // Combinar los asientos seleccionados en un string
        $reservacion->precio_total = $this->calcularPrecioTotal($reservacion); // Función opcional para calcular el precio
        $reservacion->estado = 'Activo'; // Asignar estado inicial
        $reservacion->save();

        // Redirigir al usuario a la vista de reservaciones
        return redirect()->route('reservacion.index')->with('success', 'Reserva realizada con éxito.');
    }

    private function calcularPrecioTotal(Reservacion $reservacion)
    {
        $vuelo = Vuelo::find($reservacion->id_vuelo);
        $precioPorPasajero = $vuelo->precio ?? 0; // Asume que el vuelo tiene una columna 'precio'
        return $reservacion->cantidad_pasajeros * $precioPorPasajero;
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservacion $reservacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservacion $reservacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservacion $reservacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservacion $reservacion)
    {
        //
    }
}
