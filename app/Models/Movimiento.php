<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $table='tmovimiento';
    protected $primaryKey = 'idmovimiento';
    protected $fillable=['idbien','fecha','idservicio','motivo','observaciones'];
}
