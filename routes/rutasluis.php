<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hotelescontroller;

Route::middleware('auth')->group(function () {

    Route::get('/hotelesu',[hotelescontroller::class,'index'])->name('hotelesu');

    Route::post('/enviarHotel', [hotelescontroller::class, 'buscarHotel'])->name('buscarHotel');

});


require __DIR__.'/auth.php';