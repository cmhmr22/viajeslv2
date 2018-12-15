<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;



class privilegios extends Controller
{
    public function ver($id)
    {
        if (\Sv\Privilegios::verificar(7) == 0) // 7 corresponde a la asignación de privilegios de usuario
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        $usuario = \Sv\Usuarios::find($id);
        $privilegios = \Sv\Privilegios::all();

        foreach ($privilegios as $ok) {
            $rel = \Sv\RelUsuPriv::where('idUsuario', '=', $id)
            ->where('idPrivilegio', '=', $ok['id'])->first();
            
            if(!$rel)
            {
                $ok['check'] = 0;
            }
            else
            {
                $ok['check'] = 1;
            }
        }
        //fin datos de los privilegios

        return view('privilegios.ver', ['usuario' => $usuario, 'privilegios' => $privilegios]);
    }


     public function asignar(Request $data)
    {    
        if (\Sv\Privilegios::verificar(7) == 0) // 7 corresponde a la asignación de privilegios de usuario
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }



        \Sv\RelUsuPriv::where('idUsuario', '=' , $data['usuarioid'])->delete();
        foreach ($data->all() as $k => $v) 
        {
        	
        	if (is_int($k)) 
        	{//revisa si es int
        		
        		\Sv\RelUsuPriv::create([
                'idUsuario'=>$data['usuarioid'],
                'idPrivilegio'=>$k]);

        	}
        	 
        }

        return back()->with('correctoPriv', 'Los Privilegios fueron asignados satisfactoriamente');

            
    }


    

}
