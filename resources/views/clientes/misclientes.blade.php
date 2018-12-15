@extends('plantilla.p')
@section('titulo', 'Mis CLIENTES')
@section('design')
@include('partes.dashboardHeader')

                    <div id="page-content">
                        <!-- Datatables Header 
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-table"></i>MIS CLIENTES<br><small>Base de datos de clientes, aqui encontraras la base de datos completa de todos tus clientes que has recopilado.</small>
                                </h1>
                            </div>
                        </div>
                       -->
                        <!-- END Datatables Header -->
                       <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2>Base de datos de <strong>Clientes</strong></h2>
                            </div>
                            <p>Usa las flechas en las casillas superiores para ordenar los datos en la tabla, ademas recuerda que puedes filtrar la información en la base de datos, para hacer mas rapida tu busqueda.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Nombre</th>
                                            <th>Datos de contacto</th>
                                            <th>Dirección</th>
                                            <th>F. Ingreso</th>
                                            <th>U. viaje</th>
                                            

                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $i=0; ?>
                                        @foreach($clientes as $c)
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="text-center"> {{$c['id']}} </td>
                                            <td><a href="cliente-ver-{{$c['id']}}"> {{$c['nombre']}} </a></td>
                                            <td><strong>Correo:</strong>  {{$c['email']}} 
                                                <br><strong>Celular:</strong>  {{$c['celular']}} 
                                                <br><strong>Telefono:</strong>  {{$c['telefono']}} 
                                            </td>
                                            <td>{{$c['direccion']}}
                                                
                                            </td>
                                            <td><input type="hidden" id="{{$i}}" value="{{$c['created_at']}}">
                                                <span value id="{{$i}}s"></span></td>
                                            <td>{{\Sv\ventas::ultimo_destino($c['id'],'destino') }}</td>
                                            
                                            <td>{!!\Sv\clientes::status($c['status'])!!}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    @if(\Sv\Privilegios::verificar(11) == 1)
                                                    @include('partes.clientes.btnmodificar')
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
                    document.getElementById("seccionCliente").className = "open";
                    document.getElementById("listaCliente").style.display = "block";
                    document.getElementById("misClientes").className = "active ";  
                    document.getElementById("mCli").className = "active ";  
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
                        $('#'+i+'s').append(moment(t).format('LLL'));
                    }else{ break; }
                }
                

                </script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection