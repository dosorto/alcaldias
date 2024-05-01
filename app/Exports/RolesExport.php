<?php

namespace App\Exports;

use App\Models\Roles;
use Maatwebsite\Excel\Concerns\FromCollection;

class RolesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Roles::all();
    }
}
