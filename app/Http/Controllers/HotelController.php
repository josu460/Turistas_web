<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    return view('hoteles.hotelesu'); // Retorna la vista principal de hoteles
  }

  public function buscarHotel(Request $request)
  {
    // Inspeccionar los datos enviados desde el formulario
    //dd($request->all());

    // Validación del formulario con los criterios de búsqueda y filtros
    $validacion = $request->validate([
      // Criterios de búsqueda principales
      'campoDestino' => 'required|string|max:100', // Nombre del hotel, obligatorio, texto y longitud máxima de 100 caracteres
      'campoInicio' => 'required|date|after_or_equal:today', // Fecha de entrada, obligatoria, debe ser hoy o en el futuro
      'campoFin' => 'required|date|after:campoInicio', // Fecha de salida, obligatoria, posterior a la de entrada
      'campoAdultos' => 'required|integer|min:1|max:10', // Adultos, obligatorio, mínimo 1 y máximo 10
      'campoInfantes' => 'nullable|integer|min:0|max:10', // Niños, opcional, mínimo 0 y máximo 10
      'campoHabitaciones' => 'required|integer|min:1|max:5', // Habitaciones, obligatorio, mínimo 1 y máximo 5

      // Filtros adicionales
      'campoEstrellas' => 'nullable|integer|min:1|max:5', // Estrellas, opcional, entre 1 y 5
      'campoPrecio' => 'nullable|numeric|min:0', // Precio máximo, opcional, número positivo
      'campoDistancia' => 'nullable|numeric|min:0', // Distancia máxima, opcional, número positivo
      'camposServicios' => 'nullable|array', // Servicios, opcional, debe ser un array si está presente
      'camposServicios.*' => 'string|in:wifi,piscina,desayuno', // Cada servicio en el array debe ser válido
    ]);

    // Extraer parámetros de búsqueda
    $destino = $validacion['campoDestino'];
    $fechaInicio = $validacion['campoInicio'];
    $fechaFin = $validacion['campoFin'];
    $habitaciones = $validacion['campoHabitaciones'];
    $adultos = $validacion['campoAdultos'];
    $ninos = $validacion['campoInfantes'] ?? 0;

    // Extraer filtros adicionales
    $estrellas = $validacion['campoEstrellas'] ?? null;
    $precio = $validacion['campoPrecio'] ?? null;
    $distancia = $validacion['campoDistancia'] ?? null;
    $servicios = $validacion['camposServicios'] ?? [];

    // Buscar hoteles con los criterios y filtros
    $hoteles = Hotel::whereHas('destinos', function ($query) use ($destino) {
      $query->where('lugares.lugar', 'like', "%{$destino}%");
    })->get();
    // ->where(function ($query) use ($fechaInicio, $fechaFin) {
    //   $query->where('checkin', '<=', $fechaFin) // checkin del hotel debe ser antes o igual al check-out del usuario
    //         ->where('checkout', '>=', $fechaInicio); // checkout del hotel debe ser después o igual al check-in del usuario
    // })->get();
  

    // Retornar a la vista con los datos validados
  return view('hoteles.hotelesu', compact('hoteles', 'estrellas', 'precio', 'distancia', 'servicios'));
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Hotel $hotel)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Hotel $hotel)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Hotel $hotel)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Hotel $hotel)
  {
    //
  }
}
