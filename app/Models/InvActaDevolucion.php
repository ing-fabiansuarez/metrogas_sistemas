<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvActaDevolucion extends Model
{
    use HasFactory;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function detalle()
    {
        return $this->belongsToMany(InvProducto::class, 'inv_acta_devolucion_detalles', 'acta_devolucion_id', 'producto_id')->using(InvActaDevolucionDetalle::class);
    }
}
