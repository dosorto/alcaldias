<?php

namespace App\Exports;

use App\Models\Municipio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class municipiosExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    return Municipio::with('departamentos',)->get()->map(function($municipio) {
        return [
            'id' => $municipio->id,
            'codigo' => $municipio->codigo,
            'nombre' => $municipio->name,
            'departamento_id' => $municipio->departamentos->name
            ];
    });
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        // Aquí defines los encabezados de las columnas.
        return [
            'ID',
            'Codigo' ,
            'Nombre',
            'Departamento',
        ];
    }

    /**
    * @return array
    */
    public function styles(Worksheet $sheet)
    {
        // Aquí defines los estilos de las celdas.
        return [
            // Estilo para la fila de encabezados.
            1    => ['font' => ['bold' => true]],
        ];
    }

    /**
    * @return array
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:D1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('#F5F5F7');
            },
        ];
    }
}
