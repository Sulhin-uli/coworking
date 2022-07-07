<?php

namespace App\Exports;

use App\TipePemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TipePemesananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TipePemesanan::all();
    }
}
