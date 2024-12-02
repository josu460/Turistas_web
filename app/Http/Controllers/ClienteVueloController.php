<?php

namespace App\Http\Controllers;

use App\Models\ClienteVuelo;
use Illuminate\Http\Request;
use App\Models\Vuelo;

class ClienteVueloController extends Controller
{
    // VueloController.php
public function mostrarVistaCompra($id)
{
    $vuelo = Vuelo::with('asientos')->findOrFail($id);
    return view('vuelos.comprarvuelo', compact('vuelo'));
}

public function confirmarCompra(Request $request)
{
    // Procesa la compra del vuelo
    // $request->all() contiene los datos enviados
    return redirect()->route('home')->with('success', 'Compra confirmada');
}

}
