@extends('plantilla.p')
@section('titulo', 'Viajes Disponibles')
@section('design')
<!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-table"></i>Viajes<br><small>Panel de viajes disponible.</small>
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
                                <h2>Lista de <strong>Viajes Disponibles</strong></h2>
                            </div>
                            <p>Esta es la lista de viajes Disponibles, aqui podras ver todos los viajes activos y realizar contratos.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Destino</th>
                                            <th>Fechas</th>
                                            <th>Asientos</th>
                                            <th>Status</th>
                                            <th>Tus ventas</th>
                                            
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($viajes as $v)
                                        <?php $i++; ?>
                                            <tr>
                                                <td class="text-center"> {{$v['id']}} </td>
                                                
                                                <td><a href="viaje-ver-{{$v['id']}}">{{$v['destino']}} </a></td>
                                                <td>
                                                    <strong>Salida:</strong> 
                                                    <input type="hidden" id="{{$i}}" value="{{$v['fechaSalida'].' '.$v['horaSalida']}}">
                                                    <span value id="{{$i}}s"></span>
                                                    <br>
                                                    <strong>Regreso:</strong> 
                                                    
                                                    <input type="hidden" id="{{$i}}r" value="{{$v['fechaRegreso'].' '.$v['horaRegreso']}}">
                                                    <span value id="{{$i}}rs"></span>
                                                    
                                                    
                                                    
                                                </td>
                                                <td>
                                                     <strong>Total:</strong> {{$v['asientosDisponibles']}}
                                                    <br>
                                                    <strong>Vendidos:</strong> {{\Sv\viajes::datos($v['id'],'sumViajantes')}}
                                                    <br>
                                                    <strong>Aun Disponibles:</strong> {{$v['asientosDisponibles']-\Sv\viajes::datos($v['id'],'sumViajantes') }}
                                                     
                                                    
                                                </td>
                                                <td>
                                                    {!!\Sv\viajes::status($v['status'])!!}
                                                </td>
                                                <td>
                                                    <strong>Vendiste:</strong> {!! \Sv\ventas::D_V_por_viaje( $v['id'], 'numPasajeros') !!}
                                                    <br>
                                                    <strong>Ultima venta:</strong> {!! \Sv\ventas::D_V_por_viaje( $v['id'], 'ultimoViaje') !!} 
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="viaje-modificar-{{$v['id']}} " data-toggle="tooltip" title="Generar Contrato" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                       
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
                    document.getElementById("seccionViaje").className = "open";
                    document.getElementById("listaViaje").style.display = "block";
                    document.getElementById("viajesDisponibles").className = "active ";
                   
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
                        $('#'+i+'s').append(moment(t).format("YYYY/MM/DD - hh:mm"));
                        t= $('#'+i+'r').val();
                        $('#'+i+'rs').append(moment(t).format("YYYY/MM/DD - hh:mm"));
                    }else{ break; }
                }
                

                </script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/tablesDatatables.js"></script>
                <script>$(function(){ TablesDatatables.init(); });</script>
@endsection