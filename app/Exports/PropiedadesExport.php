<?php

namespace App\Exports;

use App\Models\Propiedad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PropiedadesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Propiedad::with('TipoPropiedad', 'Barrio', 'Contribuyente', 'Georeferenciacion')->get()->map(function ($propiedad) {
            $contribuyente = $propiedad->Contribuyente;
            $nombreCompleto = $contribuyente ? 
                "{$contribuyente->primer_nombre} {$contribuyente->segundo_nombre} {$contribuyente->primer_apellido} {$contribuyente->segundo_apellido}" 
                : '';

            // Concatenar latitudes y longitudes
            $latitudes = $propiedad->Georeferenciacion->pluck('latitud')->implode('; ');
            $longitudes = $propiedad->Georeferenciacion->pluck('longitud')->implode('; ');

            return [
                'id' => $propiedad->id,
                'identidad' => optional($contribuyente)->identidad,
                'nombre_completo' => $nombreCompleto,
                'profesion_id' => optional($contribuyente->Profecion_oficio)->nombre,
                'telefono' => optional($contribuyente)->telefono,
                'IdTipoPropiedad' => optional($propiedad->TipoPropiedad)->Nombre,
                'paises_id' => optional($propiedad->Barrio->Aldea->municipios->departamentos->paises)->nombre,
                'departamento_id' => optional($propiedad->Barrio->Aldea->municipios->departamentos)->name,
                'municipio_id' => optional($propiedad->Barrio->Aldea->municipios)->name,
                'aldea_id' => optional($propiedad->Barrio->Aldea)->nombre,
                'latitudes' => $latitudes, // Concatenar todas las latitudes
                'longitudes' => $longitudes, // Concatenar todas las longitudes
                'direccion' => $propiedad->Direccion,
            ];
        });
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Id',
            'Identidad',
            'Nombre Completo',
            'Profesión',
            'Teléfono',
            'Tipo de Propiedad',
            'Pais',
            'Departamento',
            'Municipio',
            'Aldea',
            'Latitudes', 
            'Longitudes', 
            'Descripción'
        ];
    }

    /**
    * @return array
    */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
    * @return array
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:M1'; // Asegurarse de que este rango incluya todas las columnas de encabezado
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ADD8E6'); // Celeste
    
                // Centrar los encabezados
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
