<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table='tusuario';
    protected $primaryKey='id';
    protected $fillable = ['nombres','apellidos','usuario','tipo_usuario','contrasenia'];
}
