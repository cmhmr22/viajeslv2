<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
      protected $table = "clientes"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','nombre','telefono','celular','direccion','email','status','ultimoViaje','idUsuario'];//las columnas de la base de datos

 	public static function status($id){ //Asigna nombre al status

        switch ($id) {
            case '0':
                return "<span class='label label-warning'>Casual</span>";
                break;
            case '1':
                return "<span class='label label-success'>Constante</span>";
                break;
            case '3':
                return "<span class='label label-info'>Con poco interes</span>";
                break;
            case '9':
                return "<span class='label label-danger'>Eliminado</span>";
                break;
            
            default:
                return "no encontramos el comando, revisa modelo usuarios/status";
                break;
        }
    }

    public static function buscar($id , $motivo){ //Asigna nombre al status
        $c = \Sv\clientes::find($id);
        switch ($motivo) {
            case 'nombre':
                return $c['nombre'];
                break;
            case 'celular':
                return $c['celular'];
                break;
            case 'direccion':
                return $c['direccion'];
                break;
            case 'email':
                return $c['email'];
                break;
            case 'telefono':
                return $c['telefono'];
                break;
            
            default:
                return "no encontramos el comando, revisa modelo usuarios/status";
                break;
        }
    }
    public static function Html(){ //Asigna nombre al status
            $cli = \Sv\clientes::where('status', '<>', '9')->get();
            $r = "";
            foreach ($cli as $c) 
            {
                $r = $r."<option value='".$c['id']."'>".$c['nombre']."</option>";
            }
            return $r;
        }
    public static function nuevo($data){ //Asigna nombre al status
            \Sv\clientes::create([
                'nombre'=>$data['nombre'],
                'celular'=>$data['celular'],
                'telefono'=>$data['telefono'],
                'direccion'=>$data['direccion'],
                'email'=>$data['email'],
                'idUsuario'=>\Sv\Usuarios::mi('id'),
                
            ]);
            $buscarid = \Sv\clientes::all()->last();
            return $buscarid['id'];
        }
      public static function modificar($data){ //Asigna nombre al status
                $datos = \Sv\clientes::find($data['idCliente']);
                
                $datos->email = $data['email'];
                $datos->nombre = $data['nombre'];
                $datos->celular = $data['celular'];
                $datos->direccion = $data['direccion'];
                $datos->telefono = $data['telefono'];
                $datos->save();

            return $data['idCliente'];
        }
        
        
}
