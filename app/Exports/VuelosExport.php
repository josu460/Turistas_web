<?php

namespace App\Exports;

use App\Models\Vuelo;
use Maatwebsite\Excel\Concerns\FromCollection;

class VuelosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vuelo::all();
    }
}
