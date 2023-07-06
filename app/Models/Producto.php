<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    protected $fillable=['id_categoria','codigo','nombre','stock','descripcion','imagen','estatus'];
    protected $guarded = [];
}
