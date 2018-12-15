<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;




class boletos extends Controller
{
   

    
    public function listarJson($id)
    {
        $bol = \Sv\boletos::where('idViaje', '=', $id)->get();
            $r = "";
            $i=0;
            foreach ($bol as $c) 
            {
                $i++;
                $r = $r.'<tr>
                <td><input type="text" id="'.$i.'@nombre" name="'.$i.'@nombre" class="form-control" value="'.$c['tipoBoleto'].'" readonly></td>
                <td><input type="number" id="'.$i.'@costo" name="'.$i.'@costo" class="form-control" value='.$c['Costo'].' readonly></td>
                <td><input type="number" id="'.$i.'@cantidad" name="'.$i.'@cantidad" class="cantidad form-control" value="0" onchange="calcular(this);"
onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" min="0"></td>
                <td><input type="number" id="'.$i.'@total" name="'.$i.'@total" class="form-control" value="0" readonly>
                
                <input type="hidden" name="'.$i.'@id" value='.$c['id'].' class="form-control"></td>
                </tr>'; 
            }
            return $r;

        
    } //fin ver lista

    public function listarModJson($idViaje, $idVenta)
    {
        $bol = \Sv\boletos::where('idViaje', '=', $idViaje)->get();
            $r = "";
            $i=0;
            foreach ($bol as $c) 
            {
                $i++;
                $r = $r.'<tr>
                <td><input type="text" id="'.$i.'@nombre" name="'.$i.'@nombre" class="form-control" value="'.$c['tipoBoleto'].'" readonly></td>
                <td><input type="number" id="'.$i.'@costo" name="'.$i.'@costo" class="form-control" value='.$c['Costo'].' readonly></td>
                <td><input type="number" id="'.$i.'@cantidad" name="'.$i.'@cantidad" class="cantidad form-control" value="'.\Sv\viajantes::buscar($idVenta, $c['id'], 'cantidad').'" onchange="calcular(this);"
onkeyup="this.onchange();"   onpaste="this.onchange();" oninput="this.onchange();" min="0"></td>
                <td><input type="number" id="'.$i.'@total" name="'.$i.'@total" class="form-control" value="'.\Sv\viajantes::buscar($idVenta, $c['id'], 'costoTotal').'" readonly>
                
                <input type="hidden" name="'.$i.'@id" value='.$c['id'].' class="form-control"></td>
                </tr>'; 
            }
            return $r;

        
    } //fin ver lista
}
