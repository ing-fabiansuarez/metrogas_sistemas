<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvBodega extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'inv_bodegas';
    protected $fillable = ['nombre'];

    public function productos()
    {
        return $this->belongsToMany(InvProducto::class, 'inv_almacen_bodegas', 'bodega_id', 'producto_id')->using(InvAlmacenBodega::class);
    }
}
