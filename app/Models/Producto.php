<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','stock','descripcion','imagen'];
    public $timestamps = false; // si tu tabla no usa timestamps
}
