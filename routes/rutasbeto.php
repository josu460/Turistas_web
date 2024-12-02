<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotelcontroller;

Route::middleware('auth')->group(function () {

    Route::resource('hotel', HotelController::class);

  // Rutas específicas
    Route::post('/hotel/buscar', [HotelController::class, 'buscarHotel'])->name('hotel.buscarHotel');

    
    
    /* Route::get('/hotelesu',[hotelescontroller::class,'index'])->name('hotelesu');

    Route::post('/enviarHotel', [hotelescontroller::class, 'buscarHotel'])->name('buscarHotel'); */

});


require __DIR__.'/auth.php';