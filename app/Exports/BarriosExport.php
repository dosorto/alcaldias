<?php

namespace App\Exports;

use App\Models\Barrio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class BarriosExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    return Barrio::with('aldea',)->get()->map(function($barrio) {
        return [
            'id' => $barrio->id,
            'nombre' => $barrio->nombre,
            'direccion' => $barrio->direccion,
            'latitud' => $barrio->latitud,
            'longitud' => $barrio->longitud,
            'aldea_id' => $barrio->aldea->nombre
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
            'Nombre' ,
            'Direccion',
            'Latitud',
            'Longitud',
            'Aldea',
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
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('#F5F5F7');
            },
        ];
    }
}
