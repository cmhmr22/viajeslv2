@extends('plantilla.p')
@section('titulo', 'Datos del cliente')
@section('design')
<div class="row">
<!-- Second Column -->
                            <div class="col-md-4 col-lg-4">
                                <!-- Info Block -->
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title">
                                        
                                        <h2>Datos del <strong>Cliente</strong> </h2>
                                        @if(\Sv\Privilegios::verificar(11) == 1)

                                        <div class="block-options pull-right">
                                            <a href="cliente-modificar-{{$c['id']}}" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Modificar Datos del Cliente"><i class="fa fa-pencil"></i></a>
                                        </div>
                                       
                                        @endif
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-borderless table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Nombre</strong></td>
                                                <td>{{$c['nombre']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telefono</strong></td>
                                                <td>{{$c['telefono']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Celular</strong></td>
                                                <td>{{$c['celular']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Direccion</strong></td>
                                                <td>{{$c['direccion']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Correo</strong></td>
                                                <td>{{$c['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Asesor que lo registo</strong></td>
                                                <td>{{\Sv\Usuarios::buscar($c['idUsuario'],'Nom') }}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Ultimo contrato realizado</strong></td>
                                                <td><a href="venta-ver-{{\Sv\ventas::ultimo_destino($c['id'],'id') }}" class="label label-info">{{\Sv\ventas::ultimo_destino($c['id'],'destino') }}</a></td>
                                            </tr>
                                            

                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>
                                <!-- END Info Block -->

                               
                                

                                
                            </div>
                            <!-- END Second Column -->

<!-- First Column -->
                            <div class="col-md-8 col-lg-8">
                                <!-- ventas -->

                                <div class="block">
                                     <div class="block-title">
                                        
                                        <h2>Tabla de <strong>viajes realizados </strong> </h2>
                                    </div>
                                  

                        
                         
                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped">
                                    <thead style="font-size: .8em !important;">
                                        <tr >
                                            <th>ID Contrato</th>
                                            <th>Destino</th>
                                           
                                            <th># personas</th>
                                    
                                            <th>Total Pagar</th>
                                            <th>Desc</th>
                                            <th>Pagado</th>
                                            <th>Restan</th>
                                            <th>Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {!!\Sv\ventas::por_cliente($c['id'])!!}
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <!-- END Responsive Full Content 
                            <div class="block-title">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-striped">
                                        <thead>
                                            <tr>
                                                        
                                                <th class="text-center">Contratos</th>
                                                <th class="text-center">Totales</th>
                                                <th class="text-center">Total recibido</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <tr>    
                                                    <td class="text-center">
                                                    2
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                        $3000
                                                    </td>
                                                    <td class="text-center">
                                                        $1500
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>-->
                                </div>
                                <!-- end ventas -->

                                
                            </div>
                            <!-- END First Column -->


</div>
                <script >
                    document.getElementById("seccionCliente").className = "open";
                    document.getElementById("listaCliente").style.display = "block";
                </script>
                
@endsection