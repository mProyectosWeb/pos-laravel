<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    // Nombre la tabla en Mysql
    protected $table = 'persona';
    // Se refiera a la llave primaria
    protected $primaryKey = 'id_persona';
    public $timestamps = false;
    protected $fillable=['tipo_persona','nombre','tipo_documento','num_documento','direccion','telefono','email'];
    protected $guarded = [];
}
