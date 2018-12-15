<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class actualizar extends Model
{
   
 	public static function a(){ //Asigna nombre al status
 		$v=\Sv\viajantes::all();
 		foreach ($v as $k) {
 			$b=\Sv\boletos::find($k['IdBoleto']);
 			$k->nombre=$b['tipoBoleto'];
                $k->save();
 		}
        return "ok";
    }
        
        
}
