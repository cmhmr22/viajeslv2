@extends('plantilla.p')
@section('titulo', 'Datos del Usuario')
@section('design')
<div class="row">
<!-- Second Column -->
                            <div class="col-md-4 col-lg-4">
                                <!-- Info Block -->
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title">
                                        
                                        <h2>Datos de <strong>Usuario</strong> </h2>
                                        @if(\Sv\Privilegios::verificar(11) == 1)
                                        
                                        <a href="usuario-modificar-{{$u['id']}}" class="pull-right btn-xs btn btn-info">Modificar</a>
                                        @endif
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-borderless table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Nombre</strong></td>
                                                <td>{{$u['nombre']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telefono</strong></td>
                                                <td>{{$u['telefono']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Correo</strong></td>
                                                <td>{{$u['correo']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Direccion</strong></td>
                                                <td>{{$u['direccion']}}</td>
                                            </tr>
                                            
                                            

                                            <tr>
                                                <td><strong>Fecha de ingreso</strong></td>
                                                <td>{{$u['Created_at']}}</td>
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
                                        {!!\Sv\ventas::por_usuario($u['id'])!!}
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <!-- END Responsive Full Content -->
                            <div class="block-title">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-striped">
                                        <thead>
                                            <tr>
                                                        
                                                <th class="text-center">Contratos</th>
                                                <th class="text-center">Personas</th>
                                                <th class="text-center">Ultima Venta</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <tr>    
                                                    <td class="text-center">
                                                   {{ \Sv\ventas::D_V_por_usuario($u['id'] , 'numContratos')}}
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                       {{ \Sv\ventas::D_V_por_usuario($u['id'] , 'numPasajeros')}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ \Sv\ventas::D_V_por_usuario($u['id'] , 'ultimoContrato')}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                                </div>
                                <!-- end ventas -->

                                
                            </div>
                            <!-- END First Column -->


</div>
                <script >
                   document.getElementById("seccionUsuario").className = "open";
                    document.getElementById("listaUsuario").style.display = "block";
                </script>
                
@endsection