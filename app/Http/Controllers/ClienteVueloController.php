<?php

namespace App\Http\Controllers;

use App\Models\ClienteVuelo;
use Illuminate\Http\Request;
use App\Models\Vuelo;

class ClienteVueloController extends Controller
{
    public function mostrarVistaCompra($vueloId)
    {
        // Obtener el vuelo específico por ID
        $vuelo = Vuelo::findOrFail($vueloId);
    
        // Generar asientos para el vuelo
        $vuelo->asientos = $this->generarAsientos($vuelo->numeroasientos);
    
        // Retornar la vista con el vuelo específico
        return view('vuelos.comprarvuelo', compact('vuelo'));
    }
    
    
    private function generarAsientos($totalAsientos)
    {
        $asientos = [];
        $filas = ceil($totalAsientos / 4); // Suponiendo 4 columnas por fila
    
        for ($fila = 1; $fila <= $filas; $fila++) {
            for ($columna = 1; $columna <= 4; $columna++) {
                $numeroAsiento = (($fila - 1) * 4) + $columna;
                if ($numeroAsiento <= $totalAsientos) {
                    $asientos[] = chr(64 + $fila) . $columna; // Ejemplo: A1, A2, etc.
                }
            }
        }
    
        return $asientos;
    }
    
public function confirmarCompra(Request $request)
{
    // Procesa la compra del vuelo
    // $request->all() contiene los datos enviados
    return redirect()->route('home')->with('success', 'Compra confirmada');
}

}
