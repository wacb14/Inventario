<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $table='tbien';
    protected $primaryKey = 'idbien';
    protected $fillable=['idservicio','cod_patrimonial','procedencia','nombre','cantidad','marca','modelo',
    'num_serie','color','medidas','estado_conservacion','estado','observacion','fecha_adquisicion','fecha_ult_inventario'];
}
