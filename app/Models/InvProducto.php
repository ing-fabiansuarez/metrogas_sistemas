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

    public function almacenBodega()
    {
        return $this->belongsToMany(InvBodega::class, 'inv_almacen_bodegas', 'producto_id', 'bodega_id')->using(InvAlmacenBodega::class);
    }
}
