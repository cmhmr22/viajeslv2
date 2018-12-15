<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
	
    protected $table = "pagos"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
    protected $fillable= ['id', 'idUsuario', 'idVenta', 'cantidad', 'comentario', 'restan'];//las columnas de la base de datos
    
    public static function nuevo($data){
        if (isset($data['abono']) && $data['abono'] > 0) {
           \Sv\pagos::create([
                
            'idUsuario'=>\Sv\Usuarios::mi('id'),
            'idVenta'=>$data['idVenta'],
            'cantidad'=>$data['abono'],
            'comentario'=>$data['comentario'],
            'restan'=>$data['restanActualmente'],
            
        ]);
           return "ok";
        }
        return "error";

        
        
     }

    
     public static function buscar($data){
        $d = \Sv\pagos::where('idVenta','=', $data)->orderBy('created_at', 'asc')->first(); 
        return $d;
     }

     public static function Html($data){
        $d = \Sv\pagos::where('idVenta','=', $data)->orderBy('created_at', 'desc')->get(); 
        $html = "";
        $i=0;
        
        foreach ($d as $v) {
        $i++;
            $html = $html.'<tr>
                            <td><input type="hidden" id="'.$i.'" value="'.$v['created_at'] .'">
                            <span value id="'.$i.'s"></span></td>                            
                            <td>'.\Sv\Usuarios::buscar($v['idUsuario'], 'Nom').'</td>
                            <td>'.$v['comentario'].'</td>
                            <td>$'.number_format($v['cantidad'],2).'</td>
                            <td>$'.number_format($v['restan'],2).'</td>
                            <td><a href="recibo-imprimir-'.$v['id'].'" data-toggle="tooltip" title="Imprimir Recibo" target="_blank" class="btn btn-xs btn-info"<i class="fa fa-pencil"></i>Imprimir</a></td>
                         </tr>';
        }

        return $html;
     }

     public static function calcular($id){
        $d = \Sv\pagos::where('idVenta','=', $id)->sum('cantidad'); 
        return '$'.number_format($d, 2);
     }

    public static function abonado($idV)
    {
      
              $v = \Sv\pagos::where('idVenta', '=', $idV)->sum('cantidad'); 

              return $v;
    }
}