<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;




class pagos extends Controller
{
   

    public function ver_nuevo()
    {
            return view('pagos.nuevo');

        
    } //fin ver lista
    
    public function abonar($id)
    {
            return view('pagos.abonar', ['id'=> $id ]);

        
    } //fin ver lista

    public function add_pago(Request $data)
    {       //solo sirve para estandarizar el data 
           $data['idVenta'] = $data['idContrato'];


           $contrato = \Sv\ventas::find($data['idContrato']);
           $data['restanActualmente'] = $contrato['restanActualmente']-$data['abono'];
           
           $check = \Sv\pagos::nuevo($data);
           
           if ($check == "ok") {
            $contrato['restanActualmente'] = $data['restanActualmente'];
           }
           if ($contrato['restanActualmente'] <= 0 ) {
               $contrato['status'] = 2;
           }
           
           $contrato->save();
            \Sv\bitacora::apuntar($contrato['idViaje'],'nAbono');//apunta en la bitacora la accion
            return back()->with('correcto', 'El abono se a realizado correctamente! ');

        
    } //fin ver lista

  
}
