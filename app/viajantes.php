<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class viajantes extends Model
{
	
      protected $table = "viajantes"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id', 'idViaje', 'idVenta', 'cantidad', 'costoUnitario',	'costoTotal', 'IdBoleto', 'nombre'];//las columnas de la base de datos
     public static function nuevos($data){ //
            //viajantes
        //id idViaje idVenta cantidad costoUnitario costoTotal IdBoleto
        for ($i=1; $i < 100; $i++) { 
            $bDatos = array();
            $verificar = false;
            
            foreach ($data->all() as $key => $v) {//hace el guardado de los boletos
                
                   if (before('@', $key) == $i) // en caso de que exista 
                    {
                        $verificar= true;     
                        switch ($key) { // arregla los datos y los guarda en un array
                            case $i.'@cantidad':
                                
                                	$bDatos['can'] = $data[$key];
                                
                                break;
                            case $i.'@costo':
                                $bDatos['cos']= $data[$key];
                                break;
                            case $i.'@total':
                                $bDatos['tot']= $data[$key];
                                break;
                            case $i.'@id':
                                $bDatos['id']= $data[$key];
                                break;
                            case $i.'@nombre':
                                $bDatos['nombre']= $data[$key];
                                break;
                            
                            default:
                                return "Error desconocido";
                                break;
                        }
                        
                    }
               }
               
               if (isset($bDatos['can']) && $bDatos['can'] > 0) { //si la cantidad de boletos a pedir es mayor a 0 entonces creara un registro
                            \Sv\viajantes::where('IdBoleto','=',$bDatos['id'])->where('nombre','=',$bDatos['nombre'])->delete();

                            \Sv\viajantes::create([
                
                                'idViaje'=>$data['idViaje'],
                                'idVenta'=>$data['idVenta'],
                                'nombre'=>$bDatos['nombre'],
                                'cantidad'=>$bDatos['can'],
                                'costoUnitario'=>$bDatos['cos'],
                                'costoTotal'=>$bDatos['tot'],
                                'IdBoleto'=>$bDatos['id']
                            ]);

               }

               if ($verificar == false) { //una vez que no encuente ningun registro mas saldra
                   return "Terminó Satisfactoriamente";
               }

        }
        return "Error extraño";
        }
    public static function Html($id)//imprime una tabla de los boletos consumidos por contrato
    {
        $check = \Sv\viajantes::where('idVenta', '=', $id)->get();
        $cadena = "";
        foreach ($check as $key) {
                 
                 $cadena.= '<tr>
                              <td><strong>'.$key['nombre'].'</strong></td>
                              <td>'.$key['cantidad'].'</td>
                              <td>$'.number_format($key['costoUnitario'], 2).'</td>
                              <td>$'.number_format($key['costoTotal'], 2).'</td>
                          </tr>';   
                }
                return $cadena;
    }

     public static function buscar($idV, $idB, $accion)//imprime una tabla de los boletos consumidos por contrato
    {
              $check = \Sv\viajantes::where('idVenta', '=', $idV)->where('IdBoleto', '=', $idB)->first();
        switch ($accion) {
          case 'cantidad':
              if (!isset($check['cantidad'])) {
                return 0;
              }
              return $check['cantidad'];
            break;
          case 'costoTotal':
              if (!isset($check['costoTotal'])) {
                return 0;
              }
              return $check['costoTotal'];
            break;
          
          default:
            return "error";
            break;
        }
              
    }

    




}