<?php

namespace App\Models;

use App\Http\Livewire\Inventario\InvBodegas\Bodegas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvProducto extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'inv_productos';
    protected $fillable = [
        'nombre',
        'codigo_interno',
        'serial',
        'marca_id',
        'bodega_id',
        'created_by',
    ];

    public function caracteristicas()
    {
        return $this->hasMany(
            InvProductoCaracteristica::class,
            'producto_id',
            'id'
        );
    }

    public function marca()
    {
        return $this->belongsTo(InvMarca::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function ubicacion()
    {
        return $this->morphTo(__FUNCTION__, 'ubicacion_type', 'ubicacion_id');
    }

    public function historial()
    {
        return $this->hasMany(
            InvProductoHistorial::class,
            'producto_id',
            'id'
        );
    }
}
