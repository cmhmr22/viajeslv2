<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class ventasNow extends Model
{
      protected $table = "view_ventas_Actuales"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','idUsuario','idViaje','idCliente','status','numeroPersonas','subTotal','descuento','totalPagar','restanActualmente', 'destino', 'folio'];//las columnas de la base de datos
}
