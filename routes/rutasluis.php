<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

// Tal vez no sea necesario
//use App\Http\Controllers\hotelescontroller;

Route::middleware('auth')->group(function () {

  // Rutas RESTful para la gestión de hoteles usando Eloquent
  Route::resource('hotel', HotelController::class);

  // Rutas específicas
  Route::post('/hotel/buscar', [HotelController::class, 'buscarHotel'])->name('hotel.buscarHotel');


  /* Tal vez no sea necesario
  Route::get('/hotelesu',[hotelescontroller::class,'index'])->name('hotelesu');
  Route::post('/enviarHotel', [hotelescontroller::class, 'buscarHotel'])->name('buscarHotel');
  */

});

require __DIR__.'/auth.php';
