@extends('plantilla.p')
@section('titulo', 'Panel Contratos realizados')
@section('design')
<!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-table"></i>Contratos<br><small>Panel administrativo de contratos realizados.</small>
                                </h1>
                            </div>
                        </div>
                        
                        <!-- END Datatables Header -->
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->
                                      @include('partes.mensajes')
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->


                        <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2>Lista de <strong>Contratos realizados por todos los asesores</strong></h2>
                                @if($h == 0)
                                <a href="ventas-listar-historial" class="pull-right btn btn-info">Ver historial de contratos realizados</a>
                                @else
                                <a href="ventas-listar" class="pull-right btn btn-warning">Ver contratos Actuales</a>
                                @endif
                            </div>
                            <p>Esta es la lista de contratos disponibles, aqui podras ver todos los contratos que has realizado.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 75px;">ID</th>
                                            <th>Contratante</th>
                                            <th>Destino</th>
                                            <th>Fecha de contrato</th>
                                            <th>Lugares</th>
                                            <th>Asesor</th>
                                            <th>Pagos realizados</th>
                                            <th>Status</th>
                                            
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ventas as $v)

                                            <tr>
                                                
                                                
                                                <td><a href="venta-ver-{{$v['id']}}"># {{$v['id'].'/'.$v['folio']}} </a></td>
                                                <td>
                                                    <a href="cliente-ver-{{$v['idCliente']}}">{{\Sv\clientes::buscar($v['idCliente'],'nombre')}}</a>
                                                </td>
                                                <td>
                                                    <a href="viaje-ver-{{$v['idViaje']}}">{{\Sv\viajes::buscar($v['idViaje'],'destino')}}</a>
                                                </td>
                                                <td>

                                                    {{$v['created_at']}} 
                                                    
                                                    
                                                </td>
                                                <td>
                                                    <strong>Total:</strong> {{$v['numeroPersonas']}}        
                                                </td>
                                                <td>{{\Sv\Usuarios::buscar($v['idUsuario'],'Nom')}} </td>
                                                <td>
                                                    <strong>Total a pagar:</strong> ${{$v['totalPagar']}}
                                                    <br>
                                                    <strong>Pagado:</strong> ${{$v['totalPagar']-$v['restanActualmente']}} 
                                                    <br>
                                                    @if($v['restanActualmente'] > 0)<strong style="color: red;">
                                                    @else
                                                    <strong style="color: green;">
                                                    @endif
                                                    Debe: ${{$v['restanActualmente']}} </strong> 
                                                    

                                                    
                                                </td>
                                                <td>{{\Sv\ventas::status($v['status'])}} </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="venta-ver-{{$v['id']}} " data-toggle="tooltip" title="Ver contrato" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                        <a href="venta-modificar-{{$v['id']}} " data-toggle="tooltip" title="Modificar contrato" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                        @if($v['status'] != 2)
                                                        <a href="pago-abonar-{{$v['id']}} " data-toggle="tooltip" title="Abonar contrato" class="btn btn-xs btn-success"><i class="fa fa-dollar"></i></a>
                                                        @endif
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->


                <script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVentas").style.display = "block";
                    document.getElementById("verVentas").className = "active ";  
                </script>
                <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection