@extends('plantilla.p')
@section('titulo', 'Ver detalles Contrato')
@section('design')

<?php $c= \Sv\clientes::find($venta['idCliente']); ?>
<?php $v= \Sv\viajes::find($venta['idViaje']); ?>
<?php $p= \Sv\pagos::buscar($venta['id']); ?>
          <style type="text/css">
              
            @media print {
                * {
                    
                    font-size: 11px !important;
                    padding-top: 2px !important;
                    padding-bottom: 0px !important;
                    text-shadow: none !important;
                    margin-top: 2px !important;
                    box-shadow: none !important;
                    padding-top: 0px;
                    .table {
                    border-collapse: collapse !important;
                    }
                    .table-bordered th,
                    .table-bordered td {
                    border: 1px solid #ddd !important;
                    }
                   }
                }
                
          </style>          

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dummy Content -->
                        <div class="block full block-alt-noborder" >
                        	
                        	<div class="block-title " >
                                        
                                        <h1>DATOS DEL CONTRATO REALIZADO <strong>#{{$venta['id'].'/'.$venta['folio']}}</strong> </h1>

                            <a href="pdf-venta-{{$venta['id']}}" style="margin-right: 10px;margin-left: 10px;" target="_blank" class=" pull-right btn btn-info btn-md">Imprimir Contrato </a>
                            <a href="venta-modificar-{{$venta['id']}}"  style="margin-right: 10px;margin-left: 10px;" class=" pull-right btn btn-warning btn-md">Modificar Contrato </a>
                            </div>


                                <div class="block" >
                                    <!-- Info Title -->
                                    <div class="block-title  text-center" >
                                        
                                        <h2>Información del <strong>Asesor</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Nombre del asesor</strong></td>
                                                <td>{{\Sv\Usuarios::buscar($venta['idUsuario'],'Nom')}} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha que realizó el contrato</strong></td>
                                                <td>{{$venta['created_at']}}</td>
                                            </tr>
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>
                                 <!-- Info Block -->
                                <div class="block" >
                                    <!-- Info Title -->
                                    <div class="block-title  text-center" >
                                        
                                        <h2>Información del <strong>cliente</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Nombre</strong></td>
                                                <td>{{$c['nombre']}} </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dirección</strong></td>
                                                <td>{{$c['direccion']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telefono fijo</strong></td>
                                                <td>{{$c['telefono']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Celular</strong></td>
                                                <td>{{$c['celular']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email</strong></td>
                                                <td>{{$c['email']}}</td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>
                                <div class="block" >
                                
                                    <!-- Info Title -->
                                    <div class="block-title  text-center">
                                        
                                        <h2>Datos del <strong>viaje contratado</strong> </h2>
                                    </div>
                                    <!-- END Info Title -->
                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>Punto de partida</strong></td>
                                                <td>{{$v['lugarSalida']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Destino</strong></td>
                                                <td>{{$v['destino']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha y hora de salida</strong></td>
                                                <td>Fecha de salida {{$v['fechaSalida']}} a las {{$v['horaSalida']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fecha y hora de Regreso</strong></td>
                                                <td>Fecha de Regreso {{$v['fechaRegreso']}} a las {{$v['horaRegreso']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong># Personas que viajan</strong></td>
                                                <td>{{$venta['numeroPersonas'] }}</td>
                                            </tr>  
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                               </div>
                                <div class="block" >
                                
                                    <!-- Info Title -->
                                    <div class="block-title text-center">
                                        
                                        <h2>Detalles de costo por<strong> persona</strong> </h2>

                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-bordered table-striped" >
                                        <thead>
                                        	<td><strong>Boleto</strong></td>
                                        	<td><strong>Cantidad</strong></td>
                                        	<td><strong>Precio Unitario</strong></td>
                                        	<td><strong>Total</strong></td>
                                        </thead>
                                        <tbody>
                                            {!!\Sv\viajantes::Html($venta['id'])!!}
                                        </tbody>
                                    </table>
                                   
                               </div>
                                <div class="block" >
                                
                                    <!-- Info Title -->
                                    <div class="block-title text-center">
                                        
                                        <h2>Detalles del<strong> contrato</strong> </h2>
                                    </div>
                                    <table class="table table-bordered table-striped text-right" >
                                        <tbody>
                                            
                                            <tr>
                                                <td><strong>SubTotal</strong></td>
                                                <td>${{number_format($venta['subTotal'], 2)}}</td>
                                                
                                            </tr>
                                            @if($venta['descuento'] != 0)
                                            <tr>
                                                <td><strong>Descuento</strong></td>
                                                <td>${{number_format($venta['descuento'], 2)}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><strong>Total a pagar</strong></td>
                                                <td>${{number_format($venta['totalPagar'], 2)}}</td>
                                                
                                            </tr>
                                            @endif
                                            <tr>
                                                <td><strong>Abonado actualmente</strong></td>
                                                <td>${{number_format(\Sv\pagos::abonado($venta['id']), 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Resta a pagar</strong></td>
                                                <td>${{number_format($venta['restanActualmente'], 2)}}</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END Info Block -->
	                                <div class="block">
	                                	<div class="block-title text-center">
                                        
                                        <h2>Total<strong> abonado</strong> </h2>
                                        @if($venta['status'] != 2)
                                        <span class="pull-right"><a href="pago-abonar-{{$venta['id']}} " class="btn btn-success btn-md">Abonar</a></span>
                                        @endif
                                    </div>
	                                   <table class="table table-bordered table-striped">
	                                        	<thead>
	                                        		<tr>
	                                        			<td><strong>Fecha</td></strong>
	                                        			
	                                        			<td><strong>Recibió</td></strong>
	                                        			<td><strong>Comentario</td></strong>
	                                        			<td><strong>Cantidad</td></strong>
	                                        			<td><strong>Restan</td></strong>
                                                        <td><strong>Imprimir</td></strong>
	                                        		</tr>
	                                        	</thead>
	                                		<tbody>
	                                			{!!\Sv\pagos::Html($venta['id'])!!}
	                                		</tbody>
	                                	</table>
	                                </div>
                                <!-- END Info Block -->
                        </div>
                        <!-- END Dummy Content -->
                    </div>
                    <!-- END Page Content -->
                   <script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVentas").style.display = "block";
                      
                    </script> 

                    <script src="js/vendor/jquery.min.js"></script>
                    <script src="js/moment.js"></script>
                    <script src="js/moment-with-locales.min.js"></script>
                    <script >/// formatea la fecha a una mas comprensible
                    moment.locale('es');
                    for (var i = 1; i <= 100; i++) {
                        if (document.getElementById(i) instanceof Object) 
                        {
                            t= $('#'+i).val();
                            $('#'+i+'s').append(moment(t).format('LLLL'));
                            
                        }else{ break; }
                    }
                

                </script>
               
@endsection