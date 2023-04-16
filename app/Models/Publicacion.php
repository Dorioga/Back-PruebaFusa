<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $table ="Publicacion";
    protected $primaryKey = 'id_publicacion';
    protected $fillable=['id_publicacion','autor','titulo','descripcion','estado_publicacion'];
}
