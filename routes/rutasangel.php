<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reportes;

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Ruta para la vista principal de reportes
    Route::get('/reportes', [Reportes::class, 'index'])->name('reportes.index');

    // Rutas para exportar Hoteles
    Route::get('/reportes/hoteles/pdf', [Reportes::class, 'exportarHotelesPDF'])->name('reportes.hoteles.pdf');
    Route::get('/reportes/hoteles/excel', [Reportes::class, 'exportarHotelesExcel'])->name('reportes.hoteles.excel');

    // Rutas para exportar Vuelos
    Route::get('/reportes/vuelos/pdf', [Reportes::class, 'exportarVuelosPDF'])->name('reportes.vuelos.pdf');
    Route::get('/reportes/vuelos/excel', [Reportes::class, 'exportarVuelosExcel'])->name('reportes.vuelos.excel');

    // Ruta para el reporte de reservaciones (cuando la vista esté lista)
    // Esta ruta será funcional cuando se agregue la funcionalidad en el controlador
    Route::get('/reportes/reservaciones/pdf', [Reportes::class, 'exportarReservacionesPDF'])->name('reportes.reservaciones.pdf');
    Route::get('/reportes/reservaciones/excel', [Reportes::class, 'exportarReservacionesExcel'])->name('reportes.reservaciones.excel');
});

// Rutas de autenticación
require __DIR__.'/auth.php';
