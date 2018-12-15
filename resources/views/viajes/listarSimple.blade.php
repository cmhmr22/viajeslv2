@extends('plantilla.p')
@section('titulo', 'Viajes Disponibles')
@section('design')
@include('partes.dashboardHeader')
<script src="js/vendor/jquery.min.js"></script>
                    <div id="page-content">
                       
                                      @include('partes.mensajes')
                                      
                        <div class="block full">
                            <div class="block-title">
                                <h2>Lista de <strong>Viajes Disponibles</strong></h2>
                            </div>


                            <div class="table-responsive">
                                
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                           <th>ID</th>
                                            <th  class="text-center">Destino</th>
                                            <th>Fechas</th>
                                            <th>Costos</th>
                                            <th style="width: 100px;">Asientos Disponibles</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($viajes as $v)
                                        <?php $i++; ?>
                                            <tr>
                                                <td>{{$v['id']}}</td>
                                                <td class="text-center"><a href="viaje-ver-{{$v['id']}}"><strong>{{$v['destino']}}</strong> </a></td>
                                                <td>
                                                    <strong>Salida:</strong> 
                                                    <input type="hidden" id="{{$i}}" value="{{$v['fechaSalida']}} ">
                                                    <span value id="{{$i}}s"></span>
                                                    <br>
                                                    <strong>Regreso:</strong> 
                                                    <input type="hidden" id="{{$i}}r" value="{{$v['fechaRegreso']}} ">
                                                    <span value id="{{$i}}rs"></span>
                                                    <br>  
                                                    
                                                    
                                                </td>
                                                <td>
                                                    {!!\Sv\boletos::listar($v['id'],'br')!!}
                                                </td>
                                                <td>

                                                     {{$v['asientosDisponibles']-\Sv\viajes::datos($v['id'],'sumViajantes') }}
                                                </td>
                                                <td>
                                                    {!!\Sv\viajes::status($v['status'])!!}
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
                    document.getElementById("vDis").className = "active ";  
                </script>
                
                <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                for (var i = 1; i <= 100; i++) {
                    if (document.getElementById(i) instanceof Object) 
                    {
                        t= $('#'+i).val();
                        $('#'+i+'s').append(moment(t).format("YYYY/MM/DD - hh:mm:ss"));
                        tr= $('#'+i+'r').val();
                        $('#'+i+'rs').append(moment(t).format("YYYY/MM/DD - hh:mm:ss"));

                    }else{ break; }
                }
                

                </script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/tablesDatatables.js"></script>
                <script>$(function(){ TablesDatatables.init(); });</script>
                @endsection