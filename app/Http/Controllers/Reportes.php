<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Vuelo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HotelesExport;
use App\Exports\VuelosExport;
use Barryvdh\DomPDF\Facade\Pdf;

class Reportes extends Controller
{
    /**
     * Muestra la vista principal de reportes.
     */
    public function index()
    {
        return view('reportes.index');
    }

    /**
     * Exporta los hoteles a PDF.
     */
    public function exportarHotelesPDF()
    {
        $hoteles = Hotel::all(); // Obtén los hoteles desde la base de datos
        $pdf = Pdf::loadView('adminhoteles.HotelesA', compact('hoteles')); // Correcto: vista en subcarpeta adminhoteles
        return $pdf->download('hoteles.pdf');
    }

    /**
     * Exporta los hoteles a Excel.
     */
    public function exportarHotelesExcel()
    {
        return Excel::download(new HotelesExport, 'hoteles.xlsx');
    }

    /**
     * Exporta los vuelos a PDF.
     */
    public function exportarVuelosPDF()
    {
        $vuelos = Vuelo::all(); // Obtén los vuelos desde la base de datos
        $pdf = Pdf::loadView('adminvuelos.VuelosA', compact('vuelos')); // Correcto: vista en subcarpeta adminvuelos
        return $pdf->download('vuelos.pdf');
    }

    /**
     * Exporta los vuelos a Excel.
     */
    public function exportarVuelosExcel()
    {
        return Excel::download(new VuelosExport, 'vuelos.xlsx');
    }
}
