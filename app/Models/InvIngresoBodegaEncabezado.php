<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvIngresoBodegaEncabezado extends Model
{
    use HasFactory;

    public function detalle()
    {
        return $this->belongsToMany(InvProducto::class, 'inv_ingreso_bodega_detalles', 'ingreso_bodega_encabezado_id', 'producto_id')->using(InvIngresoBodegaDetalle::class);
    }
}
