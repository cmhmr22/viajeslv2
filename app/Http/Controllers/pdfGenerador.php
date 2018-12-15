<?php
//MC = Movimientos Controller 
namespace Sv\Http\Controllers;
use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use app\Http\Controllers\Controller;



class pdfGenerador extends Controller
{
    public function venta($id)
    {
        $venta = \Sv\ventas::find($id);
        

        return view('pdf.contratoConFormato', ['venta'=> $venta ] );
        /*
        $pdf = PDF::loadView('pdf.contrato', ['venta'=> $venta] );
        return $pdf->stream();
        */
        //return $pdf->download('archivo.pdf');

        
    }

    public function ticket($id)
    {
        $ticket = \Sv\pagos::find($id);
        $venta = \Sv\ventas::find($ticket['idVenta']);
        $cliente = \Sv\clientes::find($venta['idCliente']);
        return view('pdf.recibo', ['p'=>$ticket,'v'=>$venta,'c'=> $cliente]);
        /*
        $pdf = PDF::loadView('pdf.contrato', ['venta'=> $venta] );
        return $pdf->stream();
        */
        //return $pdf->download('archivo.pdf');

        
    }

    public function ventano($id)
    {
        $venta = \Sv\ventas::find($id);
        //return view('pdf.contrato', ['venta'=> $venta] );
        
        $pdf = PDF::loadView('pdf.contrato', ['venta'=> $venta] );
        return $pdf->stream();
        //return $pdf->download('archivo.pdf');

        
    }
   

    

}
