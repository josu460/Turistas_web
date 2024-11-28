<?php

use App\Http\Controllers\hotelescontroller;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

// ruta para el home
Route::get('/Home', [hotelescontroller::class,'inicio'])->name('Home'); 

});


require __DIR__.'/auth.php';