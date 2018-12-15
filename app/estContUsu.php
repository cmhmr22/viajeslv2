<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class estContUsu extends Model
{
      protected $table = "contrato_usuario_estadisticas"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
protected $fillable= [
'idV',
'idVen',
'numeroPersonas',
'totalPagar',
'idCliente',
'idUsuario',
'idViaje',
'statusVentas',
'restanActualmente',
'destino',
'fechaSalida',
'horaSalida',
'statusViajes',
'created_at',

'updated_at'];//las columnas de la base de datos
}
