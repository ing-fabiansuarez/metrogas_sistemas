<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvProducto extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'inv_productos';
    protected $fillable = ['nombre', 'descripcion'];

    public function caracteristicas()
    {
        return $this->hasMany(InvProductoCaracteristica::class);
    }
}
