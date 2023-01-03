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
}
