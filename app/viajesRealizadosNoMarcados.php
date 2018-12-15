<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class viajesRealizadosNoMarcados extends Model
{
    protected $table = "lista_viajes_realizados"; //para conocer cual es la tabla
    //public $timestamps = false; // para desactivar el timestamp

	public static function marcar(){ 
	   $r = \Sv\viajesRealizadosNoMarcados::all();

	   if (empty($r)) {//revisa si el array esta vacio

	    foreach ($r as $k) {

	           	$v = viajes::find($k['id']);
	           	$v->status = 6;
	           	$v->save();

	           }
	           return "ok";	
	    }
	           
		return "no existe";
	}   
}
