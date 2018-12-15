<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;
include 'scriptsphp/modificadores.php';




class viajes extends Controller
{
    public function listarJson($id = 0)
    {
      
      $v = \Sv\viajes::find($id);
      
         $v['disponibles'] = $v['asientosDisponibles']-\Sv\viajes::datos($v['id'], 'sumViajantes');
      
     return $v;
    } //fin listar viaje

    public function ver_panel()
    {
        if (\Sv\Privilegios::verificar(14) == 0) // Corresponde a la vista de todos los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

      $viajes=\Sv\viajes::all();
        return view('viajes.listarTodos', ['viajes' => $viajes]);

        
    } //fin ver panel

    public function ver_lista()
    {

        \Sv\viajesRealizadosNoMarcados::marcar();
       $viajes=\Sv\ultimosViajes::all();
        return view('viajes.listar', ['viajes' => $viajes]);  
    } //fin ver lista
    public function ver_listaSimple()
    {

        \Sv\viajesRealizadosNoMarcados::marcar();
       $viajes=\Sv\ultimosViajes::all();
        return view('viajes.listarSimple', ['viajes' => $viajes]);  
    } //fin ver lista

     public function ver_nuevo()
    {
        if (\Sv\Privilegios::verificar(15) == 0) // Corresponde a la vista de todos los clientes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }

       //$datos= \Sv\clientes::all();
         return view('viajes.nuevo');

        
    } //fin ver lista
    
     public function nuevo( request $data)
    {
        if (\Sv\Privilegios::verificar(15) == 0) // Corresponde a agregar nuevos viajes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
       

        //valida la informacion
          $v = \Validator::make($data->all(), [
            
            
                'destino'=>'required',
                'fechaSalida'=>'required',

                'fechaRegreso'=>'required',
                'asientosDisponibles'=>'required',
                        
            ]);
             if ($v->fails())
            {   
                //$request->session()->flash('r', $data);
                return back()->with('mensaje', 'necesitamos la fecha de salida, fecha de regreso, el destino y los asientos disponibles para poder dar de alta el viaje');
            }
           

          if (isset($data['descripcion']) || $data['descripcion'] == "") {
              $data['descripcion'] = "Sin informacion al respecto";
          }

      $buscarid = \Sv\viajes::agregar($data);

       
  
       foreach ($data->all() as $key => $v) {//hace el guardado de los boletos

           if (is_int($key)) 
            {//revisa si es int

                \Sv\boletos::create([
                    'idViaje'=> $buscarid,
                    'tipoBoleto'=> before('@', $data[$key]),
                    'Costo' => after('@', $data[$key]),
                    ]);
            }
       }

        \Sv\bitacora::apuntar($buscarid,'nViaje');//apunta en la bitacora la accion
       
         return redirect('viaje-correcto-'.$buscarid);

        
    } //fin viaje nuevo

      public function ver_modificar($id)
    {
        if (\Sv\Privilegios::verificar(16) == 0) // Corresponde la modificacion de los viajes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
       
        $viajes=\Sv\viajes::find($id);
        return view('viajes.modificar', ['v' => $viajes]);
        
    } //fin ver_modificar

    public function modificar( request $data)
    {
        if (\Sv\Privilegios::verificar(16) == 0) // Corresponde la modificacion de los viajes
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
       
        

        //valida la informacion
          $v = \Validator::make($data->all(), [
            
            
                'destino'=>'required',
                'fechaSalida'=>'required',

                'fechaRegreso'=>'required',
                'asientosDisponibles'=>'required',
                        
            ]);
             if ($v->fails())
            {   
                //$request->session()->flash('r', $data);
                return back()->with('mensaje', 'necesitamos la fecha de salida, fecha de regreso, el destino y los asientos disponibles para poder dar de alta el viaje');
            }
            $fSalida = date_create($data['fechaSalida']);
            $hSalida = date_create($data['horaSalida']);
            $fRegreso = date_create($data['fechaRegreso']);
            $hRegreso = date_create($data['horaRegreso']);


          

            $datos = \Sv\viajes::find($data['id']);
            //revisa datos de la fecha

            if ($datos->fechaSalida != $data['fechaSalida']) {
                $datos->status = 5;
            }

            $datos->destino = $data['destino'];
            $datos->fechaSalida=date_format($fSalida,'Y-m-d');
            $datos->horaSalida=date_format($hSalida,'H:i:s');
            $datos->fechaRegreso=date_format($fRegreso,'Y-m-d');
            $datos->horaRegreso=date_format($hRegreso,'H:i:s');
            $datos->asientosDisponibles = $data['asientosDisponibles'];
            
        
            $datos->save();

      

            \Sv\boletos::listar($data['id'],'delete');
  
       foreach ($data->all() as $key => $v) {//hace el guardado de los boletos

           if (is_int($key)) 
            {//revisa si es int
                if (after_last('@', $data[$key]) == 'sinid') {//si es nuevo se crea un registro in id existente
                    \Sv\boletos::create([
                    
                    
                    'idViaje'=> $data['id'],
                    'tipoBoleto'=> before('@', $data[$key]),
                    'Costo' => between('@','@', $data[$key]),
                    ]);
                }
                else
                {
                    \Sv\boletos::create([
                    'id'=> after_last('@', $data[$key]),
                    
                    'idViaje'=> $data['id'],
                    'tipoBoleto'=> before('@', $data[$key]),
                    'Costo' => between('@','@', $data[$key]),
                    ]);  
                }

                
            }
       }
       \Sv\bitacora::apuntar($data['id'],'mViaje');//apunta en la bitacora la accion
       return redirect('viaje-correcto-'.$data['id']);
         //return back()->with('correcto','El viaje ah sido modificado correctamente');

        
    } //fin modviaje
    
      public function ver_correcto($id)
    {
        return view('viajes.correcto', ['id' => $id]);
        
    }
      public function ver_viaje($id)
    {
        
        $viajes=\Sv\viajes::find($id);
        return view('viajes.ver', ['v' => $viajes]);
    }

     public function modificar_desc($id)
    {

        return view('viajes.descripcion', ['v'=> \Sv\viajes::find($id)] );
        
    }
    public function mod_descripcion(request $data)
    {
            $datos = \Sv\viajes::find($data['id']);
            //revisa datos de la fecha

            
            $datos->lugarSalida = $data['lugarSalida'];
            $datos->descripcion = $data['descripcion'];
            
        
            $datos->save();
    return back()->with('correcto', 'El destino fue Guardado exitosamente');        
    }

}
