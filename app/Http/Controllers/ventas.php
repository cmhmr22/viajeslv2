<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;
include 'scriptsphp/modificadores.php';


class ventas extends Controller
{
    public function ver()
    {
        if (\Sv\Privilegios::verificar(21) == 0) // Corresponde a generar nuevos contratos
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        return view('ventas.nuevo');
    }

  public function nuevo(Request $data)
    {
        

        if (\Sv\Privilegios::verificar(21) == 0) // Corresponde a generar nuevos contratos
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }


        //valida la informacion
          $v = \Validator::make($data->all(), [
            
            'folio' => 'required',
            'nombre' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'idViaje' => 'required',
            'numeroPersonas' => 'required',
            'subTotal' => 'required',
            'totalPagar' => 'required',
            'abono' => 'required',
            'restanActualmente' => 'required',
            
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, vuelve a intentarlo');
            }

        switch ($data['tipoAccionUsuario']) //Datos del cliente 
        {
            case 'existente':
                //$data['idCliente'] = $data['idCliente'];
                break;
            case 'nuevo':
                $data['idCliente'] = \Sv\clientes::nuevo($data);//crea el nuevo cliente
                
                break;
            case 'modificar':
                $data['idCliente'] = \Sv\clientes::modificar($data);//actualiza datos del lciente cliente
                
                break;
            
            default:
                 return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, vuelve a intentarlo');
                break;
        }
        //generar registro de venta

        $data['idVenta'] = \Sv\ventas::nuevo($data);
        
        \Sv\viajantes::nuevos($data);
        \Sv\pagos::nuevo($data);

        \Sv\viajes::calc_status($data['idViaje']);

        \Sv\bitacora::apuntar($data['idViaje'],'nContrato');//apunta en la bitacora la accion
        return redirect('venta-correcto-'.$data['idVenta']);
    }
    public function verConCliente( $id)
    {
        if (\Sv\Privilegios::verificar(21) == 0) // Corresponde a generar nuevos contratos
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        return view('ventas.ventaCliente', ['id' => $id]);
    }
 public function nuevoConCliente( Request $data)
    {
        

        if (\Sv\Privilegios::verificar(21) == 0) // Corresponde a generar nuevos contratos
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }


        //valida la informacion
          $v = \Validator::make($data->all(), [
            
            'folio' => 'required',
            
           
            'idViaje' => 'required',
            'numeroPersonas' => 'required',
            'subTotal' => 'required',
            'totalPagar' => 'required',
            'abono' => 'required',
            'restanActualmente' => 'required',
            
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, vuelve a intentarlo');
            }
        
       

        $data['idVenta'] = \Sv\ventas::nuevo($data);
        
        \Sv\viajantes::nuevos($data);
        \Sv\pagos::nuevo($data);

        \Sv\viajes::calc_status($data['idViaje']);

        \Sv\bitacora::apuntar($data['idViaje'],'nContrato');//apunta en la bitacora la accion
        return redirect('venta-correcto-'.$data['idVenta']);
    }

     public function modificar(Request $data)
    {

        if (\Sv\Privilegios::verificar(21) == 0) // Corresponde a generar nuevos contratos
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }


        //valida la informacion
          $v = \Validator::make($data->all(), [
            
           
            'idVenta' => 'required',
            'idViaje' => 'required',
            'numeroPersonas' => 'required',
            'subTotal' => 'required',
            'totalPagar' => 'required',
            
            'restanActualmente' => 'required',
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, vuelve a intentarlo');
            }

       
        //modifica los datos de la venta

        \Sv\ventas::modificar($data);
        //elimina los datos de los viajantes.
        //crea nuevamente los datos de los viajantes
        \Sv\viajantes::nuevos($data);
        \Sv\pagos::nuevo($data);

        \Sv\viajes::calc_status($data['idViaje']);

        \Sv\bitacora::apuntar($data['idViaje'],'mContrato');//apunta en la bitacora la accion
        return redirect('venta-correcto-'.$data['idVenta']);
    }
    public function ver_venta($id)
    {
       $venta = \Sv\ventas::find($id);
        

        return view('ventas.ver', ['venta'=> $venta ] );
        
    }

    public function ver_correcto($id)
    {
        return view('ventas.correcto', ['id' => $id]);
        
    }
    public function listarTodas()
    {
        $ventas= \Sv\ventasNow::all();
        //h corresponde a historial
        return view('ventas.listarTodos', ['ventas' => $ventas,'h' => 0] );
        
    }
    public function listarTodas_historial()
    {
        $ventas= \Sv\ventas::all();
        //h corresponde a historial
        return view('ventas.listarTodos', ['ventas' => $ventas,'h' => 1]);
        
    }

    public function listarMias()
    {
        $ventas= \Sv\ventasNow::where('idUsuario', '=', \Sv\Usuarios::mi('id'))->get();
        return view('ventas.listar', ['ventas' => $ventas,'h' => 0]);
        
    }
    
    public function listarMias_historial()
    {
        $ventas= \Sv\ventas::where('idUsuario', '=', \Sv\Usuarios::mi('id'))->get();
        return view('ventas.listar', ['ventas' => $ventas,'h' => 1]);
        
    }
    public function modificar_venta($id)
    {
        
        $venta = \Sv\ventas::find($id);
        

        return view('ventas.modificar', ['v'=> $venta ] );
        
    }
    

}
