<?php

namespace Sv;


use Carbon\Carbon;
 
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
      protected $table = "ventas"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','idUsuario','idViaje','idCliente','status','numeroPersonas','subTotal','descuento','totalPagar','restanActualmente','folio'];//las columnas de la base de datos

 	  public static function nuevo($data){ //Asigna  una nueva venta
            

            \Sv\ventas::create([
                
                'idUsuario'=>\Sv\Usuarios::mi('id'),
                'idViaje'=>$data['idViaje'],
                'idCliente'=>$data['idCliente'],
                'status'=>1,
                'numeroPersonas'=>$data['numeroPersonas'],
                'subTotal'=>$data['subTotal'],
                'descuento'=>$data['descuento'],
                'totalPagar'=>$data['totalPagar'],
                'restanActualmente'=>$data['restanActualmente'],
                'folio'=>$data['folio'],
            ]);
           
                $buscarid = \Sv\ventas::where('idCliente', '=', $data['idCliente'])->orderBy('created_at', 'desc')->get()->first();
                return $buscarid['id'];
                
        
        }

        public static function modificar($data){ //modifica 
            
            $datos = \Sv\ventas::find($data['idVenta']);
                
                $datos->idViaje=$data['idViaje'];
                $datos->status=1;
                $datos->numeroPersonas=$data['numeroPersonas'];
                $datos->subTotal=$data['subTotal'];
                $datos->descuento=$data['descuento'];
                $datos->totalPagar=$data['totalPagar'];
                $datos->restanActualmente=$data['restanActualmente'];
                $datos->folio=$data['folio'];
                $datos->save();
            return $data['idVenta'];
        }
     public static function status($s){ //Asigna nombre al status
           switch ($s) {
                case '0':
                    return "Cancelado";
                    break;
                case '1':
                    return "Falta liquidar";
                    break;
                
                case '2':
                    return "Pagado";
                    break;
                case '3':
                    return "Viaje realizado";
                    break;
                
                default:
                    return "No encontramos informaciondel status revisar mod:ventas";
                    break;
            } 
           
        }
    public static function buscarxID($id){ //Busca por id, para asignarlo a la tabla de viajes
            $vta = \Sv\ventas::where('idViaje', '=', $id)->orderBy('created_at','desc')->get();
            $r = "";
            foreach ($vta as $v) 
            {
                $r = $r.'<tr>                 
                        <td><a href="cliente-ver-'.$v['idCliente'].'">'.\Sv\clientes::buscar($v['idCliente'], 'nombre') .'</a></td>
                        <td><a href="venta-ver-'.$v['id'].'" target="_blank">#'.$v['id'] .'/'.$v['folio'].'</a></td>
                        <td class="text-center">'.$v['numeroPersonas'] .'</td>
                        <td class="text-center">
                            $'.number_format($v['subTotal'], 2) .'
                        </td>
                        <td class="text-center">
                            $'.number_format($v['descuento'], 2) .'
                        </td>
                        <td class="text-center">
                            '.\Sv\pagos::calcular($v['id']).'
                        </td>
                        <td class="text-center">
                            $'.number_format($v['restanActualmente'], 2) .'
                        </td>
                    </tr>
                    ';
            }
            return $r;
        }
    public static function buscarxUsu($idv , $idU){ //Busca por id, para asignarlo a la tabla de viajes
            $vta = \Sv\ventas::where('idViaje', '=', $idv)->where('idUsuario', '=', $idU)->orderBy('created_at','desc')->get();
            $r = "";
            foreach ($vta as $v) 
            {
                $r = $r.'<tr>                 
                        <td><a href="cliente-ver-'.$v['idCliente'].'">'.\Sv\clientes::buscar($v['idCliente'], 'nombre') .'</a></td>
                        <td><a href="venta-ver-'.$v['id'].'" target="_blank">#'.$v['id'] .'/'.$v['folio'].'</a></td>
                        <td class="text-center">'.$v['numeroPersonas'] .'</td>
                        <td class="text-center">
                            $'.number_format($v['subTotal'], 2) .'
                        </td>
                        <td class="text-center">
                            $'.number_format($v['descuento'], 2) .'
                        </td>
                        <td class="text-center">
                            '.\Sv\pagos::calcular($v['id']).'
                        </td>
                        <td class="text-center">
                            $'.number_format($v['restanActualmente'], 2) .'
                        </td>
                    </tr>
                    ';
            }
            return $r;
        }

    public static function ultimo_destino($id, $data){ //Ultimo destino por cliente
                $datos = \Sv\ventas::where('idCliente','=',$id)->get()->last();
                
                switch ($data) {
                    case 'destino':
                     $v=\Sv\viajes::find($datos['idViaje']);
                        return $v['destino'];
                        break;
                    case 'id':
                        return $datos['id'];
                        break;
                    
                    default:
                        return "error, porfavor revisa ventasNow";
                        break;
                }
            
        }

        public static function por_cliente($id){ //Ultimos viajes por cliente
                $datos = \Sv\ventas::where('idCliente','=',$id)->orderBy('created_at','desc')->get();
                $txt = "";
                foreach ($datos as $c) {
                    $txt=$txt.' <tr>
                                            <td><a href="venta-ver-'.$c['id'].'">'.$c['id'].'/'.$c['folio'].'</a></td>
                                            <td><a href="viaje-ver-'.$c['idViaje'].'">'.\Sv\viajes::buscar($c['idViaje'],'destino').'</a></td>
                                            
                                            <td>'.$c['numeroPersonas'].'</td>
                                            <td>
                                                $'.number_format($c['subTotal'], 2) .'
                                            </td>
                                            <td>
                                                $'.number_format($c['descuento'], 2) .'
                                            </td>
                                            <td>
                                                '.\Sv\pagos::calcular($c['id']).'
                                            </td>
                                            
                                            <td>
                                               $'.number_format($c['restanActualmente'], 2) .'
                                            </td>
                                           
                                            <td><a href="venta-ver-'.$c['id'].'">Ver</a></td>
                                        </tr>';

                }
                return $txt;
            
        }
        public static function por_usuario($id){ //Ultimos viajes por cliente
                $datos = \Sv\ventasNow::where('idUsuario','=',$id)->orderBy('created_at','desc')->get();
                $txt = "";
                foreach ($datos as $c) {
                    $txt=$txt.' <tr>
                                            <td><a href="venta-ver-'.$c['id'].'">'.$c['id'].'/'.$c['folio'].'</a></td>
                                            <td><a href="viaje-ver-'.$c['idViaje'].'">'.\Sv\viajes::buscar($c['idViaje'],'destino').'</a></td>
                                            
                                            <td>'.$c['numeroPersonas'].'</td>
                                            <td>
                                                $'.number_format($c['subTotal'], 2) .'
                                            </td>
                                            <td>
                                                $'.number_format($c['descuento'], 2) .'
                                            </td>
                                            <td>
                                                '.\Sv\pagos::calcular($c['id']).'
                                            </td>
                                            
                                            <td>
                                               $'.number_format($c['restanActualmente'], 2) .'
                                            </td>
                                           
                                            <td><a href="venta-ver-'.$c['id'].'">Ver</a></td>
                                        </tr>';

                }
                return $txt;
            
        }

        public static function D_V_por_viaje($idV, $tipo){ //Datos de venta por viaje ´para el cliente
                switch ($tipo) {
                    case 'numPasajeros':
                        $d = \Sv\ventas::where('idUsuario','=',\Sv\Usuarios::mi('id'))->where('idViaje','=',$idV)->get()->sum('numeroPersonas');
                        return $d;
                        break;
                    case 'ultimoViaje':
                        $d = \Sv\ventasNow::where('idUsuario','=',\Sv\Usuarios::mi('id'))->where('idViaje','=',$idV)->get()->last();
                        return $d['created_at'];
                        break;
                    case 'html':
                        $h = \Sv\ventas::where('idUsuario','=',\Sv\Usuarios::mi('id'))->where('idViaje','=',$idV)->get();
                        return $h;
                        break;
                    
                    default:
                        return "No encontro";
                        break;
                }

                
                
        }
        public static function D_V_por_usuario($idU, $tipo){ //Datos de venta por viaje ´para el usuario
                switch ($tipo) {
                    case 'numPasajeros':
                        $d = \Sv\ventas::where('idUsuario','=', $idU)->get()->sum('numeroPersonas');
                        return $d;
                        break;
                    case 'numContratos':
                        $d = \Sv\ventas::where('idUsuario','=', $idU)->get()->count('numeroPersonas');
                        return $d;
                        break;
                    case 'ultimoContrato':
                        $d = \Sv\ventas::where('idUsuario','=',$idU)->get()->last();
                        return $d['created_at'];
                        break;
                    case 'numNowContratos':
                        $d = \Sv\ventasNow::where('idUsuario','=', $idU)->get()->count('numeroPersonas');
                        return $d;
                        break;
                    case 'estUsuSem':
                        $date = new Carbon('last sunday'); 
                            
                        $d = \Sv\estContUsu::where('idUsuario','=', $idU)->where('created_at', '>=', $date->toDateString())->get()->count('numeroPersonas');
                        
                        return $d;
                        break;
                    case 'estUsuMes':
                        $date = new Carbon('last month'); 
                        
                        $d = \Sv\estContUsu::where('idUsuario','=', $idU)->where('created_at', '>', $date->toDateString())->get()->count('numeroPersonas');
                        return $d;
                        break;

                    
                    default:
                        return "No encontro";
                        break;
                }

                
                
        }

        public static function ultimo(){ //Ultimo folio de contrato vendido
            $l = \Sv\ventas::all()->last();
                return $l['folio'];
        }


    

}
