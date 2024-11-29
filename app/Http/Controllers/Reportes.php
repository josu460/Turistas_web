<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reportes extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }
}
