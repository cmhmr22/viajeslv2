<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;



class clientes extends Controller
{
 public function correcto($id)
    {
       
         return view('clientes.correcto', ['id' => $id]);

        
    } //ver
  public function ver($id)
    {

       $datos= \Sv\clientes::find($id);
         return view('clientes.ver', ['c' => $datos]);

        
    } //ver
    public function verTodos()
    {
        if (\Sv\Privilegios::verificar(9) == 0) // Corresponde a la vista de todos los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

       $datos= \Sv\clientes::all();
         return view('clientes.listar', ['clientes' => $datos]);

        
    } //fin ver todos

    public function listarJson($id = 0)
    {
      
      $c = \Sv\clientes::find($id);
     return $c;
    } //fin ver todos

     public function mios($id)
    {
    	if (\Sv\Usuarios::mi('id') != $id) // Corresponde a la vista de todos los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

       //$datos= \Sv\clientes::where('idUsuario', '=', $id)->get();
         $datos =\Sv\clientes::all();
         return view('clientes.misclientes', ['clientes' => $datos]);
    }

    public function nuevo(Request $data)
    {
        if (\Sv\Privilegios::verificar(10) == 0) // Corresponde a la vista de todos los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

      

         //valida la informacion
          $v = \Validator::make($data->all(), [
            
            'nombre' => 'required|unique:clientes|',
            'celular' => 'required',
            'direccion' => 'required',
            
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'No cumples con los datos necesarios para el registro, solo necesitas (Nombre. Direccion, y Numero de Celular)');
            }

         //busca el usuario o el correo para hacer la comparacion 
        $dUser =  \Sv\clientes::
        where('nombre', '=', $data['nombre'])
        ->first();
        
        if ($dUser) {  
            return back()->with('mensaje', 'El cliente existe en nuestra base de datos');
            //aqui agregar mas
        }
         else
         {
          $id = \Sv\clientes::nuevo($data);//crea el nuevo cliente
           
          

          	return redirect('cliente-correcto-'.$id);
          
           
         }

        
    }// fin nuevo cliente
    public function ver_modificar($id)
    {

    	if(\Sv\Privilegios::verificar(11) == 0) // Corresponde a la modificacion de los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

        $datos = \Sv\clientes::find($id);
        
    	return view('clientes.modificar', ['c' => $datos]);

    }//modificar cliente
    public function modificar(Request $data)
    {

    	if(\Sv\Privilegios::verificar(11) == 0) // Corresponde a la modificacion de los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

         //valida la informacion
          $v = \Validator::make($data->all(), [
            
            'nombre' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            
            ]);
             if ($v->fails())
            {   
                return back()->with('mensaje', 'Modificar: No cumples con los datos necesarios para el registro, solo necesitas (Nombre. Direccion, y Numero de Celular)');
            }
            $id=\Sv\clientes::modificar($data);
        return redirect('cliente-correcto-'.$id);
    	//return back()->with('correcto', 'El Cliente fue Actualizado satisfactoriamente');

    }//Recibe los datos para guardar

}
