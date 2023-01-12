<?php

namespace App\Exports;

use App\Models\InvProducto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InvProductoExport implements FromCollection, WithColumnFormatting, WithMapping, WithHeadings, ShouldAutoSize
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return InvProducto::whereIn('id', $this->data)->get();
    }
    public function headings(): array
    {
        return [
            'N PRODUCTO',
            'NOMBRE',
            'CODIGO INTERNO',
            'SERIAL',
            'MARCA',
            'UBICACIÓN',
            'FECHA DE CREACIÓN',
            'ULTIMA ACTUALIZACIÓN',
            'CREADO POR',
            'CARACTERISTICAS',
        ];
    }

    //este metodo es en que se editan las filas, se debe implemtna el WithMapping y poner el metodo
    public function map($invoice): array
    {
        return [
            [

                $invoice->id,
                $invoice->nombre == null ? '' : $invoice->nombre,
                $invoice->codigo_interno == null ? '' : $invoice->codigo_interno,
                $invoice->serial == null ? '' : $invoice->serial,
                $invoice->marca->nombre == null ? '' : $invoice->marca->nombre,
                $invoice->ubicacion->nombre == null ? '' : $invoice->ubicacion->nombre,
                $invoice->created_at == null ? '' : Date::dateTimeToExcel($invoice->created_at),
                $invoice->updated_at == null ? '' : Date::dateTimeToExcel($invoice->updated_at),
                $invoice->createdBy->name == null ? '' : $invoice->createdBy->name,
                $invoice->caracteristicasToArray() == null ? '' : $invoice->caracteristicasToArray(),
            ]
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
