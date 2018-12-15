<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Sv\Http\Controllers\Controller;
//use app\Http\Controllers\Controller;

class usuario extends Controller
{
     public function login(Request $data)
    { // vista del menu de clientes
        
        //busca el usuario o el correo para hacer la comparacion 
        $dUser =  \Sv\Usuarios::
        where('bajalogica', '=', '1')
        ->where('usuario', '=', $data['login-email'])
        ->orWhere('correo', '=', $data['login-email'])
        ->first();
        
        if (!$dUser) {
            //mensaje en caso de que el usuario sea incorrecto
            
            return back()->with('mensaje', 'El usuario no existe :(');
        }

        if ( Crypt::decrypt($dUser['pass']) != $data['login-password']) {
       // if ( $dUser['pass'] != $data['login-password']) {
            //mensaje en caso de que la contraseña sea incorrecta
             
             return back()->with('mensaje','La contraseña es incorrecta :(');
         } 
         else
         {
            //guarda solo los datos necesaris de la sesion
            $datosSession = [
                'id' => $dUser['id'],
                'usuario' => $dUser['usuario'],
                'correo' => $dUser['correo'],
                'nombre' => $dUser['nombre'],
                ];

            //en caso de que sea correcto todo crea una sesion y le asigna los datos del usuario
            if ($data['login-remember-me'] == 'true') {
            $value = $data->session()->get('SUser');
            $value = $data->session()->put('SUser',$datosSession);
            //si falta algo para que haga la sesion mas duradera   
            }
            else
            {
            $value = $data->session()->get('SUser');
            $value = $data->session()->put('SUser',$datosSession);
            }
            
            //return session->has('SUser');
            return redirect('dashboard');
            
         }


            
    }



    public function registrar(Request $data)
    { // Registra un nuevo usuario
         if (\Sv\Privilegios::verificar(2) == 0) // 2 es correspondiente a registrarusuario en la BD
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }



        //busca el usuario o el correo para hacer la comparacion 
        $dUser =  \Sv\Usuarios::
        where('usuario', '=', $data['usuario'])
        ->orWhere('correo', '=', $data['email'])
        ->first();
        
        if ($dUser) {
            //mensaje en caso de que el usuario sea incorrecto
            
            return back()->with('mensaje', 'El usuario o correo existe en nuestra base de datos');
        }
        if ($data['pass'] != $data['pass2']) {
            //mensaje en caso de que el usuario sea incorrecto
            
            return back()->with('mensaje', 'Las contraseñas no coniciden');
        }
         else
         {

           \Sv\Usuarios::create([
                'usuario'=>$data['usuario'],
                'correo'=>$data['email'],
                'pass'=> Crypt::encrypt($data['pass']),
                'nombre'=>$data['nombre'],
                'telefono'=>$data['telefono'],
                'direccion'=>$data['direccion'],
                

            ]);
           
           return back()->with('correcto', 'El usuario fue creado satisfactoriamente');
         }


            
    }

    public function vertodos()
    {
         if (\Sv\Privilegios::verificar(5) == 0) // 5 correspondiente a ver la lista de usuarios en la BD
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }



        $usuarios = \Sv\Usuarios::where('bajalogica', '!=', '3')->get();
        return view('usuario.lista-usuarios', ['usuarios' => $usuarios]);

    }

    public function ver_modificar($id)
    {
        $usuario = \Sv\Usuarios::find($id);
        
        //fin datos de los privilegios

        return view('usuario.modificar', ['usuario' => $usuario]);

    }
    public function verUsuario($id)
    {
        if (\Sv\Privilegios::verificar(5) == 0) // 5 correspondiente a ver la lista de usuarios en la BD
        {
            if($id != \Sv\Usuarios::mi('id')){
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
            }
        }

        $usuario = \Sv\Usuarios::find($id);
        
        //fin datos de los privilegios

        return view('usuario.ver', ['u' => $usuario]);

    }
    public function modificar(request $data)
    {
         
         if (\Sv\Privilegios::verificar(3) == 0 ) // 3 correspondiente a modificar usuarios en la BD
        {
            $x =  session()->get('SUser');
            if($data['idu'] !=  $x['id'])
            {  
                return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
            }
        }
        
        if (strlen($data['pass']) == 0 && strlen($data['pass2'] == 0)) {
            $usuario = \Sv\Usuarios::find($data['idu']);
            $usuario->correo = $data['email'];
            $usuario->usuario = $data['usuario'];
            $usuario->nombre = $data['nombre'];
            $usuario->direccion = $data['direccion'];
            $usuario->telefono = $data['telefono'];
            $usuario->save();
            return back()->with('correcto', 'Todo excelente!. los datos se han guardado con exito y se mantienen las contraseñas anteriores.');
        }
        elseif ($data['pass'] != $data['pass2']) {
            //mensaje en caso de que el usuario sea incorrecto
            
            return back()->with('mensaje', 'Las contraseñas no coniciden');
        }
        elseif (strlen($data['pass']) < 3) {
         return back()->with('mensaje', 'La contraseña no tiene el numero ideal de caracteres.');   
        }
        else
        {
            $usuario = \Sv\Usuarios::find($data['idu']);
            $usuario->correo = $data['email'];
            $usuario->usuario = $data['usuario'];
            $usuario->nombre = $data['nombre'];
            $usuario->direccion = $data['direccion'];
            $usuario->telefono = $data['telefono'];
            $usuario->pass = Crypt::encrypt($data['pass']);
            $usuario->save();
            return back()->with('correcto', 'Todo excelente!. Todos los datos se han guardado con exito.');
        }
    }

    public function baja($id)
    {
         if (\Sv\Privilegios::verificar(6) == 0) //6 corresponde a suspender a usuario del sistema
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        $usuario = \Sv\Usuarios::find($id);
        if ($usuario['bajalogica'] == 1) {
            
            $usuario['bajalogica'] = 0;
            $usuario->save();

           return back()->with('correcto', 'El usuario ('.$usuario['usuario'].') fue dado de baja, ya no podra iniciar sesión, ni realizar ninguna accion en el sistema');
        }
        else
        {
            $usuario['bajalogica'] = 1;
            $usuario->save();

           return back()->with('correcto', 'El usuario ('.$usuario['usuario'].') vuelve a estar dado de alta, podrá iniciar sesión, y volver a realizar acciones en el sistema');   
        }

    }

        public function eliminar($id)
    {
         if (\Sv\Privilegios::verificar(4) == 0) // 4 Corresponde a eliminar a usuario del sistema
        {
            return redirect('dashboard')->with('mensaje','No tienes acceso a esta sección o acción, favor de hablar con el administrador');
        }
        
        $usuario = \Sv\Usuarios::find($id);
        if ($usuario['bajalogica'] == 0) {
            
            $usuario['bajalogica'] = 3;
            $usuario->save();

           return back()->with('correcto', 'El usuario ('.$usuario['usuario'].') Eliminado del sistema, en caso de querer recuperarlo solicite ayuda a Sistemas Dygitec');
        }
        

    }


}
