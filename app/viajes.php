<?php

namespace Sv;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class viajes extends Model
{
    protected $table = "viajes"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
    protected $fillable= ['id','destino','horaSalida','fechaSalida','horaSalida','fechaRegreso','horaRegreso','asientosDisponibles','status','descripcion', 'idUsuario', 'lugarSalida'];//las columnas de la base de datos
 	public static function Html(){ //Asigna nombre al status
            $via = \Sv\ultimosViajes::all();
            $r = "";
            foreach ($via as $c) 
            {
                $r = $r."<option value='".$c['id']."'>".$c['destino']."</option>";
            }
            return $r;
        }

    
 	public static function buscar($id , $motivo){ //Asigna nombre al status
        $c = \Sv\viajes::find($id);
        switch ($motivo) {
            case 'destino':
                return $c['destino'];
                break;
            case 'salida':

            $date = \Carbon\Carbon::parse($c['fechaSalida']);
                return $date->format('d/m/Y').' a las '.$c['horaSalida'] ;
                break;
            case 'regreso':
            $date = \Carbon\Carbon::parse($c['fechaRegreso']);
                return $date->format('d/m/Y').' a las '.$c['horaRegreso'] ;
                break;
            
            default:
                return "no encontramos el comando, revisa modelo usuarios/status";
                break;
        }
    }

    public static function datos($id, $motivo){ //Busca por id, para asignarlo a la tabla de viajes
            
            
            switch ($motivo) {
            case 'sumViajantes':
                $d = \Sv\ventas::where('idViaje','=', $id)->sum('numeroPersonas'); 
                return number_format($d);
                break;
            case 'sumViajantesRaw':
                $d = \Sv\ventas::where('idViaje','=', $id)->sum('numeroPersonas'); 
                return $d;
                break;

            case 'countContratos':
                $d = \Sv\ventas::where('idViaje','=', $id)->count('numeroPersonas'); 
                return number_format($d);
                break;
            case 'sumTotales':
                $d = \Sv\ventas::where('idViaje','=', $id)->sum('totalPagar'); 
                return '$'.number_format($d, 2);
                break;
            case 'calcRecaudado':
                $d = \Sv\ventas::where('idViaje','=', $id)->sum('totalPagar'); 
                $e = \Sv\ventas::where('idViaje','=', $id)->sum('restanActualmente');
                return '$'.number_format($d-$e, 2);
                break;
            
            default:
                return "no encontramos el comando, revisa modelo usuarios/status";
                break;
            }
        }  

    public static function status($s){ //Asigna nombre al status
        switch ($s) {
            case '0':
                return 'Cancelado';
                break;
            case '1':
                return 'Disponible';
                break;
            case '2':
                return 'Cupo limitado';
                break;
            case '3':
                return 'Cerrado';
                break;
            case '4':
                return 'Pausado';
                break;
            case '5':
                return 'Aplazado';
                break;
            case '6':
                return 'Concluido';
                break;
            default:
                return "no encontramos el comando, revisa modelo viajes/status";
                break;
        }
    }
    public static function calc_status($id){ //Asigna nombre al status
        $v = \Sv\viajes::find($id);
        $cantidadviajantes = \Sv\viajes::datos($id, 'sumViajantesRaw');
        $rec = $v['asientosDisponibles']-$cantidadviajantes;
        if($rec > 10) {
            $v->status = 1;
            $v->save();
            return "ok";
        }
        if($rec <= 10) {
            $v->status = 2;
            $v->save();
            return "ok";
        }
        if($rec <= 0) {
            $v->status = 3;
            $v->save();
            return "ok";
        }
    }

    public static function top(){ //Asigna nombre al status
        $v = \Sv\ultimosViajes::all();
        $t = '';
        $i = 0;
        foreach ($v as $k) {
        $i++;
            $t = $t.'<tr>
                    <td class="text-center"><input type="hidden" id="'.$i.'" value="'.$k['fechaSalida'].'">
                        <span value id="'.$i.'s"></span></td>
                    <td class="text-center"><a href="viaje-ver-'.$k['id'].'"><strong>'.$k['destino'].'</strong></td>
                    <td class="text-center"><strong>Personas: '.\Sv\viajes::datos($k['id'], 'sumViajantes').'</strong></td>
                    </tr>';
        }
        return $t;
    }

    public static function agregar($data){ //Asigna nombre al status
            $fSalida = date_create($data['fechaSalida']);
            $hSalida = date_create($data['horaSalida']);
            $fRegreso = date_create($data['fechaRegreso']);
            $hRegreso = date_create($data['horaRegreso']);
          

        \Sv\viajes::create([
                'destino'=>$data['destino'],
                'fechaSalida'=>date_format($fSalida,'Y-m-d'),
                'horaSalida'=>date_format($hSalida,'H:i:s'),
                'fechaRegreso'=>date_format($fRegreso,'Y-m-d'),
                'horaRegreso'=>date_format($hRegreso,'H:i:s'),
                'asientosDisponibles'=>$data['asientosDisponibles'],
                'lugarSalida'=>$data['lugarSalida'],
                'descripcion'=>utf8_decode($data['descripcion']),
                'status'=>1,

                'idUsuario'=>\Sv\Usuarios::mi('id'),
                
            ]);

         $buscarid = \Sv\viajes::where('idUsuario', '=', \Sv\Usuarios::mi('id'))->orderBy('created_at', 'desc')->get()->first();
                
           
            return $buscarid['id'];
        
    }
}
