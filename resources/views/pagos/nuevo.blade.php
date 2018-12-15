@extends('plantilla.p')
@section('titulo', 'Nuevo abono/pago')
@section('design')

                                <div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong>Realizar pago/abono</strong> (Llena cuidadosamente el formulario)</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->
                                    <!--Mensajes que aparecen despues de que se realiza una accion-->
                                        @include('partes.mensajes')
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->
                                    <!-- Horizontal Form Content -->
                                    <form action="addCli2" method="post" class="form-horizontal form-bordered">
                                         <fieldset>

                                            <legend><i class="fa fa-angle-right"></i> Buscar cliente (En base de datos)</legend>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="example-chosen">Elegir cliente</label>
                                                <div class="col-md-6">
                                                    <select name="buscarCliente" id="buscarCliente" class="select-chosen" data-placeholder="Elige al cliente.." style="width: 250px;">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                        {!!\Sv\clientes::Html()!!}

                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            
                                        </fieldset>


                                         <label class="col-md-12 text-primary control-label"><h3>Datos Personales</h3></label>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Nombre</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre completo..."  >
                                                <span class="help-block">Escribe su nombre y apellidos</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Celular</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="celular" placeholder="numero celular" >
                                                <span class="help-block">Coloca su numero de celular</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Telefono</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="telefono" placeholder="numero de telefono (Opcional)" >
                                                <span class="help-block">Coloca su numero de telefono</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Correo</label>
                                            <div class="col-md-9">
                                                <input type="email" id="example-hf-email" name="email" class="form-control" placeholder="Escribe su Correo (Opcional)">
                                                <span class="help-block">Coloca su email</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Dirección</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="direccion" placeholder="Dirección completa." >
                                                <span class="help-block">Escribe la dirección de tu casa, local, o zona de trabajo</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">

                                                <button type="submit" name="viajar" value="0" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Registrar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                                <button type="submit" name="viajar" value="1" class="btn btn-sm btn-success pull-right"><i class="fa fa-bus"></i> Guardar Asignar un viaje</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Horizontal Form Content -->
                                </div>
                                <!-- END Horizontal Form Block -->


                <script >
                    document.getElementById("seccionPago").className = "open";
                    document.getElementById("listaPago").style.display = "block";
                    document.getElementById("nuevoPago").className = "active ";  
                </script>
                  <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/formsWizard.js"></script>
                <script>$(function(){ FormsWizard.init(); });</script>
@endsection