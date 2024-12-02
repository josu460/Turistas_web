<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Aquí puedes definir tus rutas de API
Route::get('/example', function () {
    return response()->json(['message' => 'API is working']);
});
