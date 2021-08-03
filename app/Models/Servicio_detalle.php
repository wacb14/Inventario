<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio_detalle extends Model
{
    use HasFactory;
    protected $table = 'tservicio_detalle';
    protected $fillable = ['idservicio', 'idresponsable', 'fecha_inicio'];
}
