<?php

namespace App\Http\Controllers;

use App\Models\InvActaDevolucion;
use App\Models\InvActaEntrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GenerarPdfController extends Controller
{
    public function generarActaDevolucion(InvActaDevolucion $actaDevolucion)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('generar-pdf.acta-devolucion', ['object' => $actaDevolucion]);
        $pdf->render();
        return $pdf->stream('Acta de Devolución N° ' . $actaDevolucion->id . ".pdf");
    }
    public function generarActaEntrega(InvActaEntrega $actaEntrega)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('generar-pdf.acta-entrega', ['object' => $actaEntrega]);
        $pdf->render();
        return $pdf->stream('Acta de Entrega N° ' . $actaEntrega->id . ".pdf");
    }
}
