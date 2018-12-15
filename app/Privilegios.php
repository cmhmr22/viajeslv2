<?php

namespace Sv;

use Illuminate\Database\Eloquent\Model;

class Privilegios extends Model
{
      protected $table = "privilegios"; //para conocer cual es la tabla
     //public $timestamps = false; // para desactivar el timestamp
     protected $fillable= ['id','padre','nombre'];//las columnas de la base de datos

	public static function verificar($idAcceso){ //verifica si el usuario tiene el privilegio que necesita
        $x =  session()->get('SUser'); // obtiene el usuario
        $check = \Sv\RelUsuPriv::where('idUsuario', '=', $x['id'])
        ->where('idPrivilegio', '=', $idAcceso)->first(); // check revisa si existe el privilegio 
        if (!$check) {
          return 0; // si no hay registros devuelve 0, o false
        }
        else
        {
          return 1; // si existe devuelve true o 1
        } 
        
        }

  public static function mostrarHTML($id){ //verifica si el usuario tiene el privilegio que necesita en caso de tenerlo manda el html necesario
        if(\Sv\Privilegios::verificar($id) == 0)
          {//si no encuentra el acceso, retorna una cadena vacia para el sidebar
            return "";
          }

        switch ($id) {
            case '0':
              return "<li><a href='panel-control' id='panel-control'><i class='fa fa-cogs sidebar-nav-icon'></i><span class='sidebar-nav-mini-hide'>Panel de control</span></a></li>";
             break;
            case '2':
              return "<li><a id='verUsuarios' href='usuario-nuevo'>Nuevo</a></li>";
             break;
            
           case '5':
              return "<li><a id='verUsuarios' href='usuarios'>Ver todos</a></li>";
             break;
           case '9':
              return "<li><a  id='verClientes' href='clientes'>Ver todos</a></li>";
             break;
          
           case '10':
              return "<li><a id='nuevoCliente' href='cliente-nuevo'>Nuevo</a></li>";
             break;
           case '14':
              return "<li><a id='verViajes' href='viajes-panel'>Ver Todos</a></li>";
             break;
           case '15':
              return "<li><a id='nuevoViaje' href='viaje-nuevo'>Agregar</a></li>";
             break;
            case '20':
              return "<li><a id='verVentas' href='ventas-listar'>Ver Todos los contratos</a></li>";
             break;
           case '21':
              return "<li><a id='nuevaVenta' href='venta-nueva'>Agregar nuevo contrato</a></li>";
             break;
           
          

           default:
             return "No encontramos el codigo, favor de revisar modelo de Privilegios - mostrarHtml";
             break;
         } 
        
        }
}