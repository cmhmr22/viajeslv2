<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
      protected $table = "bitacora"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
   	protected $fillable= ['id','idViaje','idUsuario','mensaje'];

   	public static function htmlDash(){ //Asigna nombre al status
        $b = \Sv\bitacora::where('mensaje', '<>', '')->orderBy('created_at','desc')->get()->take(25);
        
        $t = '';
        $i = 0;       
        foreach ($b as $k) {
        $i++;
            $t = $t.'<tr>
                    <td class="text-center" style="width:100px;"> <input type="hidden" id="'.$i.'r" value="'.$k['created_at'].'">
                        <span value id="'.$i.'rs"></span>
                    </td>
                    <td class="text-center"><a href="viaje-ver-'.$k['idViaje'].'"><strong>'.$k['mensaje'].'</strong></td>
                    </tr>';
        }
        return $t;

    }

    public static function htmlViaje($id){ //Asigna nombre al status
        $b = \Sv\bitacora::where('idViaje', '=', $id)->orderBy('created_at','desc')->get();
        
        $t = '';
        foreach ($b as $k) {
            $t = $t.'<li class="media">
                                            <a href="usuario-ver-'.$k['idUsuario'].'" class="pull-left">
                                                <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right"><small><em>'.$k['created_at'].'</em></small></span>
                                                <a href="usuario-ver-'.$k['idUsuario'].'"><strong>'.\Sv\Usuarios::buscar($k['idUsuario'],'Nom').'</strong></a>
                                                <p>'.$k['mensaje'].'</p>
                                            </div>
                                        </li>';
        }
        return $t;

    }

    public static function apuntar($idV, $accion){ // Agrega a la bitacora
        $mensaje = "";
        switch ($accion) {
        	case 'nContrato':
                $mensaje = \Sv\Usuarios::mi('Nom')." agregó un nuevo contrato a ".\Sv\viajes::buscar($idV ,'destino');
                break;
            case 'nContrato':
                $mensaje = \Sv\Usuarios::mi('Nom')." modificó un contrato a ".\Sv\viajes::buscar($idV ,'destino');
                break;
        	case 'nViaje':
        		$mensaje = \Sv\Usuarios::mi('Nom')." a creado un nuevo destino a ".\Sv\viajes::buscar($idV ,'destino');
        		break;
        	case 'mViaje':
        		$mensaje = \Sv\Usuarios::mi('Nom')." modificó el viaje a ".\Sv\viajes::buscar($idV ,'destino');
        		break;
        	case 'nAbono':
        		$mensaje = \Sv\Usuarios::mi('Nom')." recibió un abono para ".\Sv\viajes::buscar($idV ,'destino');
        		break;
        	
        	default:
        		return "mensaje desconocido";
        		break;

        		}
        		\Sv\bitacora::create([
                'idViaje'=>$idV,
                'idUsuario'=>\Sv\Usuarios::mi('id'),
                'mensaje'=>$mensaje,

            ]);
        	return "ok";	


        
    }
}
