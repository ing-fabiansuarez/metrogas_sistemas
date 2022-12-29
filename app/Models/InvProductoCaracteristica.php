<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvProductoCaracteristica extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['nombre', 'valor'];

    public function producto()
    {
        return $this->belongsTo(InvProducto::class);
    }
}
