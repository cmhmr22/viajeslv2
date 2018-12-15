@extends('plantilla.p')
@section('titulo', 'Lista de Usuarios')
@section('design')
<!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-table"></i>Usuarios<br><small>Panel de control de usuarios del sistema.</small>
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
                                <h2>Lista de <strong>Usuarios</strong></h2>
                            </div>
                            <p>Usuarios. Esta es la lista de usuarios asignados paga manejar el sistema, puedes cambiar sus privilegios dando click en editar. Recuerda tener un buen control sobre tus usuarios pues pueden modificar o realizar acciones sin previa autorización.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center"><i class="gi gi-user"></i></th>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Subscripcion</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $u)
                                        <tr>
                                            <td class="text-center"> {{$u->id}} </td>
                                            <td class="text-center"><img src="img/placeholders/avatars/avatar15.jpg" alt="avatar" class="img-circle"></td>
                                            <td><a href="usuario-modificar-{{$u->id}}">{{$u->usuario}}</a></td>
                                            <td>{{$u->correo}}</td>
                                            <td>
                                                {!!\Sv\Usuarios::status($u['bajalogica'])!!}   
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                   

                                                    @if(\Sv\Privilegios::verificar(3) == 1)
                                                        <a href="usuario-modificar-{{$u->id}}" data-toggle="tooltip" title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    @endif
                                                    @if(\Sv\Privilegios::verificar(7) == 1)
                                                        <a href="usuario-asignar-privilegios-{{$u->id}}" data-toggle="tooltip" title="Asignar Privilegios" class="btn btn-xs btn-info"><i class="fa fa-id-card"></i></a>
                                                    @endif    
                                                    @if(\Sv\Privilegios::verificar(6) == 1)

                                                    

                                                        @if($u->bajalogica == 1)
                                                            <a href="usuario-baja-{{$u->id}}" data-toggle="tooltip" title="Dar de Baja" class="btn btn-xs btn-danger"><i class="fa fa-times"></i>   </a>
                                                        @else
                                                            <a href="usuario-baja-{{$u->id}}" data-toggle="tooltip" title="Volver a dar de alta" class="btn btn-xs btn-warning"><i class="fa fa-check"></i></a>
                                                            @if(\Sv\Privilegios::verificar(4) == 1)
                                                                <a href="usuario-eliminar-{{$u->id}}" data-toggle="tooltip" title="Eliminar del sistema" class="btn btn-xs btn-danger"><i class="fa fa-eraser"></i></a>
                                                            @endif
                                                        @endif
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
                    document.getElementById("seccionUsuario").className = "open";
                    document.getElementById("listaUsuario").style.display = "block";
                    document.getElementById("verUsuarios").className = "active ";  
                </script>
                <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection