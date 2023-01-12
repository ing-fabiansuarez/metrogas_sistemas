<?php

namespace App\Exports;

use App\Enums\EStateActaDevolucion;
use App\Models\InvActaDevolucion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InvActaDevolucionExport implements FromCollection, WithColumnFormatting, WithMapping, WithHeadings, ShouldAutoSize
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return InvActaDevolucion::whereIn('id', $this->data)->get();
    }
    public function headings(): array
    {
        return [
            'N ACTA DE DEVOLUCIÓN',
            'DESCRIPCION',
            'FECHA ENTREGA',
            'QUIEN ENTREGA',
            'BODEGA A LA QUE REGRESA',
            'AREA',
            'CENTRO OPERATIVO',
            'UBICACIÓN',
            'ESTADO',
            'FECHA DE CREACIÓN',
            'ULTIMA ACTUALIZACIÓN',
            'CREADO POR'
        ];
    }

    //este metodo es en que se editan las filas, se debe implemtna el WithMapping y poner el metodo
    public function map($invoice): array
    {
        return [
            [
                $invoice->id,
                $invoice->descripcion == null ? '' : $invoice->descripcion,
                $invoice->fecha_entrega == null ? '' : $invoice->fecha_entrega,
                $invoice->quien_entrega == null ? '' : $invoice->quienEntrega->name,
                $invoice->bodega_id_entrega == null ? '' : $invoice->bodegaEntrega->nombre,
                $invoice->area == null ? '' : $invoice->area,
                $invoice->centro_operativo == null ? '' : $invoice->centro_operativo,
                $invoice->ubicacion == null ? '' : $invoice->ubicacion,
                $invoice->estado == null ? '' : EStateActaDevolucion::from($invoice->estado)->getName(),
                $invoice->created_at == null ? '' : Date::dateTimeToExcel($invoice->created_at),
                $invoice->updated_at == null ? '' : Date::dateTimeToExcel($invoice->updated_at),
                $invoice->created_by == null ? '' : $invoice->createdBy->name,
            ]
        ];
    }
    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
