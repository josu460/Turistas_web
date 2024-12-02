<?php

namespace App\Exports;

use App\Models\Reservacion;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReservacionesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservacion::all();
    }
}
