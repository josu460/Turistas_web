<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\avionescontroller;
use App\Http\Controllers\hotelescontroller;
use App\Http\Controllers\Reportes;

Route::middleware('auth')->group(function () {



Route::get('VuelosA',[avionescontroller::class,'ver'])->name('VuelosA');

//Rutas para ver vuelos
Route::get('/Vuelosu',[avionescontroller::class,'index'])->name('Vuelosu');



Route:: get('/HomeAdministrador', function () {
    return view('HomeAdministrador');
})->name('HomeAdministrador');

//Rutas de reportes
Route::get('/reportes',[Reportes::class,'index'])->name('reportes');

//RUTAS DE VUELOS 
Route :: post('/enviarVuelo', [avionescontroller::class, 'VuelosBuscar'])->name('VuelosBuscar');

Route :: post('/consultar', [avionescontroller::class, 'consultar'])->name('consultar');

Route :: post('/crearVuelo', [avionescontroller::class, 'CrearVuelos'])->name('CrearVuelos');

Route :: post('/editarVuelo', [avionescontroller::class, 'EditarVuelos'])->name('EditarVuelos');

Route :: post('/comprarVuelo', [avionescontroller::class, 'ComprarVuelo'])->name('ComprarVuelo');

});



require __DIR__.'/auth.php';