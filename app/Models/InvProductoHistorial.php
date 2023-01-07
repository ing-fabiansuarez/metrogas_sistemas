<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvProductoHistorial extends Model
{
    use HasFactory;

    public function ubicacion()
    {
        return $this->morphTo(__FUNCTION__, 'ubicacion_type', 'ubicacion_id');
    }
    public function userResponsable()
    {
        return $this->belongsTo(User::class, 'responsable', 'id');
    }
}
