<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvActaEntrega extends Model
{
    use HasFactory;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function detalle()
    {
        return $this->belongsToMany(InvProducto::class, 'inv_acta_entrega_detalles', 'acta_entrega_id', 'producto_id')->using(InvActaEntregaDetalle::class);
    }

    public function userResponsable()
    {
        return $this->belongsTo(User::class, 'responsable', 'id');
    }
}
