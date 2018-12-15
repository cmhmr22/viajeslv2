<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class ultimosViajes extends Model
{
      protected $table = "ultimos_viajes"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
   protected $fillable= [
'id',
'destino',
'horaSalida',
'fechaSalida',
'horaRegreso',
'fechaRegreso',
'asientosDisponibles',
'descripcion',
'status',
'created_at',
'updated_at',
'idUsuario'];
}


