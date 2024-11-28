<?php

use Illuminate\Support\Facades\Route;

Route:: get('/HomeAdministrador', function () {
    return view('HomeAdministrador');
})->name('HomeAdministrador');

require __DIR__.'/auth.php';