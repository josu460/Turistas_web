<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\avionescontroller;
use App\Http\Controllers\Reportes;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\AerolineaController;
use App\Http\Controllers\LugarController;

Route::middleware('auth')->group(function () {

Route::get('VuelosA',[VueloController::class,'index'])->name('VuelosA');
//Rutas para ver vuelos
Route::get('/Vuelosu',[avionescontroller::class,'index'])->name('Vuelosu');

Route::get('/vuelos/{id}/edit', [VueloController::class, 'edit'])->name('vuelos.edit');


Route:: get('/HomeAdministrador', function () {
    return view('HomeAdministrador');
})->name('HomeAdministrador');

//Rutas de reportes
Route::get('/reportes',[Reportes::class,'index'])->name('reportes');

//RUTAS DE VUELOS 

//rutas prueba 1 
Route::resource('vuelos', VueloController::class);

Route::get('/Vuelosu', [VueloController::class, 'otraVista'])->name('Vuelosu');

Route::post('/buscarVuelo', [VueloController::class, 'buscarVuelo'])->name('buscarVuelo');

//rutas aerolinea
Route::resource('aerolineas', AerolineaController::class);

//rutas lugares
Route::resource('lugars', LugarController::class);

});



require __DIR__.'/auth.php';