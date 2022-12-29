<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvMarca extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'inv_marcas';
    protected $fillable = ['nombre'];
}
