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
        return $this->morphMany(InvProducto::class, 'ubicacion');
    }

    public function historial()
    {
        return $this->morphMany(InvProductoHistorial::class, 'ubicacion');
    }

    public function canDelete()
    {
        if (
            $this->productos->count() == 0
            && $this->historial->count() == 0
        ) {
            return true;
        }
        return false;
    }
}
