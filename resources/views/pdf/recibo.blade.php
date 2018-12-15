@extends('plantilla.p')
@section('titulo', 'PDF')
@section('design')

<style type="text/css">
              
            @media print {
                .col-sm-6{
                    width: 350px !important;
                    float:left;
                }
                 
                    .table-bordered th,
                    .table-bordered td {
                    border: 1px solid #000 !important;
                    }
                    .table{
                     border: 1px solid #000 !important;   
                    }
                * {
                    
                    font-size: 11px !important;
                    padding-top: 2px !important;
                    padding-bottom: 0px !important;
                    text-shadow: none !important;
                    margin-top: 2px !important;
                    box-shadow: none !important;
                    padding-top: 0px;
                   
                    
                    

                   }
                }
                
          </style>   

<div class="row">
                <div class="col-sm-6">

                    <!-- Page content -->
                    <div id="page-content">
                        
                        
                        <!-- Dummy Content -->
                        <div class="block full block-alt-noborder">
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                    
                                    <!-- Info Block -->
                                    
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2>Comprobante de <strong>PAGO</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Num Contrato</strong></td>
                                                <td class="text-center"><strong>{{$v['folio']}}</strong></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><strong>Nombre del cliente</strong></td>
                                                <td class="text-center">{{$c['nombre']}} </td>
                                            </tr>
                                              <tr>
                                                <td><strong>Destino</strong></td>
                                                <td class="text-center">{{\Sv\viajes::buscar($v['idViaje'] , 'destino')}}</td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2> <strong>Descripción</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>Cantidad</td>
                                                <td>Costo</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            {!!\Sv\viajantes::Html($v['id'])!!}
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->

                                    <table class="table table-bordered table-striped">
                                        
                                        <tbody>
                                             @if($v['descuento'] > 0)
                                            <tr>
                                                
                                                <td>Descuento</td>
                                                <td>$ {{number_format($v['descuento'] , 2)}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                
                                                <td>Total a pagar</td>
                                                <td>$ {{number_format($v['totalPagar'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Falta liquidar</td>
                                                <td>$ {{number_format($p['restan']+$p['cantidad'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Anticipo</td>
                                                <td>$ {{number_format($p['cantidad'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Restan</td>
                                                <td>${{number_format($p['restan'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Recibido por</td>
                                                <td>yassir pinzon flores</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Fecha</td>
                                                <td>San Juan del rio Queretaro. A <input type="hidden" id="f" value="{{$v['created_at']}}">
                                                    <span value id="m"></span></td>
                                            </tr>

                                            
                                        </tbody>
                                    </table>
                                 
                                    
                                    <!-- END Info Title -->
                                    <article>
                                        @if($p['comentario'] != "" )
                                        
                                        {!!$p['comentario']!!}
                                        @else
                                        Ningun Comentario
                                        @endif

                                    </article>
                                    
                                    
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- END Dummy Content -->
                    </div>
                    <!-- END Page Content -->

                </div>

                <!--Segundo formato para imprimir -->

                <div class="col-sm-6">

                    <!-- Page content -->
                    <div id="page-content">
                        
                        
                        <!-- Dummy Content -->
                        <div class="block full block-alt-noborder">
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                    
                                    <!-- Info Block -->
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2>Comprobante de <strong>PAGO</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Num Contrato</strong></td>
                                                <td class="text-center"><strong>{{$v['folio']}}</strong></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><strong>Nombre del cliente</strong></td>
                                                <td class="text-center">{{$c['nombre']}} </td>
                                            </tr>
                                              <tr>
                                                <td><strong>Destino</strong></td>
                                                <td class="text-center">{{\Sv\viajes::buscar($v['idViaje'] , 'destino')}}</td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2> <strong>Descripción</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>Cantidad</td>
                                                <td>Costo</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            {!!\Sv\viajantes::Html($v['id'])!!}
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->

                                    <table class="table table-bordered table-striped">
                                        
                                        <tbody>
                                            @if($v['descuento'] > 0)
                                            <tr>
                                                
                                                <td>Descuento</td>
                                                <td>$ {{number_format($v['descuento'] , 2)}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                
                                                <td>Total a pagar</td>
                                                <td>$ {{number_format($v['totalPagar'] , 2)}}</td>
                                            </tr>

                                            <tr>
                                                
                                                <td>Falta liquidar</td>
                                                <td>$ {{number_format($p['restan']+$p['cantidad'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Anticipo</td>
                                                <td>$ {{number_format($p['cantidad'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Restan</td>
                                                <td>${{number_format($p['restan'] , 2)}}</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Recibido por</td>
                                                <td>yassir pinzon flores</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Fecha</td>
                                                <td>San Juan del rio Queretaro. A <input type="hidden" id="fr" value="{{$v['created_at']}}">
                                                    <span value id="mr"></span></td>
                                            </tr>

                                            
                                        </tbody>
                                    </table>
                                 
                                    
                                    <!-- END Info Title -->
                                    <article>
                                        @if($p['comentario'] != "" )
                                        
                                        {!!$p['comentario']!!}
                                        @else
                                        Ningun Comentario
                                        @endif

                                    </article>
                                    
                                    
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- END Dummy Content -->
                    </div>
                    <!-- END Page Content -->

                </div>
 </div>               
                <!-- END Page Content -->
                <script src="js/vendor/jquery.min.js"></script>
                  <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                
                        t= $('f').val();
                        $('#m').append(moment(t).format('LLLL'));
                       t= $('fr').val();
                        $('#mr').append(moment(t).format('LLLL'));
                       
                        
                

                </script>
                    
@endsection