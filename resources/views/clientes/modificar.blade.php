@extends('plantilla.p')
@section('titulo', 'Modificar CLIENTE')
@section('design')

                                <div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong>Modificar Cliente</strong> (Llena cuidadosamente el formulario)</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->
                                    <!--Mensajes que aparecen despues de que se realiza una accion-->
                                        @include('partes.mensajes')
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->
                                    <!-- Horizontal Form Content -->
                                    <form action="modCli" method="post" class="form-horizontal form-bordered">
                                         <label class="col-md-12 text-primary control-label"><h3>Datos Personales</h3></label>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre completo..." value="{{$c['nombre']}}" >
                                                <span class="help-block">Escribe su nombre y apellidos</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Celular</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="celular" placeholder="numero celular"  value="{{$c['celular']}}" >
                                                <span class="help-block">Coloca su numero de celular</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Telefono</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="telefono" placeholder="numero de telefono (Opcional)" value="{{$c['telefono']}}">
                                                <span class="help-block">Coloca su numero de telefono</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Correo</label>
                                            <div class="col-md-9">
                                                <input type="email" id="example-hf-email" name="email" class="form-control" placeholder="Escribe su Correo (Opcional)" value="{{$c['email']}}">
                                                <span class="help-block">Coloca su email</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Dirección</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="direccion" placeholder="Dirección completa." value="{{$c['direccion']}}">
                                                <span class="help-block" ">Escribe la dirección de tu casa, local, o zona de trabajo</span>
                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">

                                                <button type="submit" name="idCliente" value="{{$c['id']}}" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Actualizar</button>

                                               
                                                
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Horizontal Form Content -->
                                </div>
                                <!-- END Horizontal Form Block -->


                <script >
                    document.getElementById("seccionCliente").className = "open";
                    document.getElementById("listaCliente").style.display = "block";
                    
                </script>
@endsection