<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class boletos extends Model
{
      protected $table = "boletos"; //para conocer cual es la tabla
     public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','idViaje','tipoBoleto', 'Costo'];//las columnas de la base de datos

 	  public static function listar($id, $accion){ //verifica el id
        $check = \Sv\boletos::where('idViaje', '=', $id )->get(); //  
        switch ($accion) {
        	case 'allRaw':
        		return $check;
        		break;
        	case 'html':
                $cadena = "";
                $i = 99;
                foreach ($check as $key) {
                 $i++;
                 $cadena= $cadena . '<tr class="selected" id="fila'.$i.'" onclick="seleccionar(this.id);"><td>'.$i.'</td><td>'.$key['tipoBoleto'].'</td><td>$'.$key['Costo'].'<input type="hidden" name="'.$i.'" value="'.$key['tipoBoleto'].'@'.$key['Costo'].'@'.$key['id'].'"></td></tr>';   
                }

                
                return $cadena;
                break;
            case 'br':
                $cadena = "";
                foreach ($check as $key) {
                 $cadena= $cadena .$key['tipoBoleto'].' $'.number_format($key['Costo'], 2).'<br>';   
                }
                return $cadena;
                break;

        	case 'delete':
        		\Sv\boletos::where('idViaje', '=', $id )->delete();
        		return 1;
        		break;
        	
        	default:
        		return "no encontrado, revisa modelo de boletos";
        		break;
        }
        return "no encontrado, revisa modelo de datapag";	
        
        }
}
