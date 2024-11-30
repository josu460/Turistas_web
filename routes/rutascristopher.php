<?php

use App\Http\Controllers\hotelescontroller;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

// ruta para el home
Route::get('/Home', [hotelescontroller::class,'inicio'])->name('Home'); 
Route::get('/HotelesA', [hotelescontroller::class, 'RegistrarHotel'])->name('HotelesA'); 
Route::get('/consultaH', [hotelescontroller::class, 'ConsultarHotel'])->name('consultaH'); 
Route::get('/ConsultarUsuario', [hotelescontroller::class, 'ConsultarUsuario'])->name('RutaConsultarU'); 
Route::get('/EditarUsuario', [hotelescontroller::class, 'EditarUsuario'])->name('RutaEditarU'); 

Route :: post('/añadirHotel', [hotelescontroller::class, 'addHoteles'])->name('addHoteles');
Route::post('/ActualizarUsuario', [hotelescontroller::class, 'ActualizarUsuario'])->name('ActualizarUsuario');
});


require __DIR__.'/auth.php';