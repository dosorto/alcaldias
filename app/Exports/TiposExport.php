<?php

namespace App\Exports;

use App\Models\tipo;
use Maatwebsite\Excel\Concerns\FromCollection;

class TiposExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tipo::all();
    }
}
