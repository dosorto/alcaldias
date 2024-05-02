<?php

namespace App\Exports;

use App\Models\Contribuyente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;



class ContribuyenteExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    return Contribuyente::with('Tipo_documento', 'Barrio', 'Profecion_oficio')->get()->map(function($contribuyente) {
        return [
            'id' => $contribuyente->id,
            'identidad' => $contribuyente->identidad,
            'primer_nombre' => $contribuyente->primer_nombre,
            'segundo_nombre' => $contribuyente->segundo_nombre,
            'primer_apellido' => $contribuyente->primer_apellido,
            'segundo_apellido' => $contribuyente->segundo_apellido,
            'sexo' => $contribuyente->sexo,
            'impuesto_personal' => $contribuyente->impuesto_personal,
            'direccion' => $contribuyente->direccion,
            'apartado_postal' => $contribuyente->apartado_postal,
            'telefono' => $contribuyente->telefono,
            'fecha_nacimiento' => $contribuyente->fecha_nacimiento,
            'email' => $contribuyente->email,
            'Tipo_documento_id' => optional($contribuyente->Tipo_documento)->tipo_documento,
            'Barrio_id' => optional($contribuyente->Barrio)->nombre,
            'profesion_id' => optional($contribuyente->Profecion_oficio)->nombre
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
            'identidad' ,
            'Primer Nombre',
            'Segundo Nombre',
            'Primer Apellido',
            'Segundo Apellido',
            'Sexo',
            'Impuesto Personal',
            'Direccion',
            'Apartado Postal',
            'Telefono',
            'Fecha Nacimiento',
            'Correo Electronico',
            'Tipo Documento',
            'Barrio',
            'Frofecion' 
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
                $cellRange = 'A1:P1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('#F5F5F7');
            },
        ];
    }
}

