@extends('plantilla.p')
@section('titulo', 'Nueva Venta')
@section('design')
@include('partes.dashboardHeader')
<!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2>Generar nuevo <strong>Contrato</strong></h2>
        </div>
        <!-- END Clickable Wizard Title -->

        @include('partes.mensajes')
                                   
        <!-- Clickable Wizard Content -->
        <form id="advanced-wizard" action="addVnta" method="post" class="form-horizontal form-bordered">
            <!-- First Step -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
               @include('ventas.partes.stepInfo1')



                  <!-- Buscador de clientes -->
                                     
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
                                        
                <!-- Buscador de clientes fin// -->
                <div class="col-md-5 col-sm-offset-4">
                    <div class=" row pull-right" style="margin-right: 5px;">
                        
                        <a href="javascript:void(0)" id="bt_sel" class="btn btn-sm btn-success">Seleccionar</a>
                        <a href="javascript:void(0)" id="bt_clear" class="btn btn-sm btn-warning">Nuevo Cliente</a>
                        <a href="javascript:void(0)" id="bt_mod" class="btn btn-sm btn-info">Modificar</a>
                        <input type="hidden" name="idCliente" id="idCliente" >
                        <input type="hidden" name="tipoAccionUsuario" id="tipoAccionUsuario" >
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Nombre del cliente *</label>
                    <div class="col-md-5">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del cliente" required >
                    </div> 
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Celular *</label>
                    <div class="col-md-5">
                        <input type="text" name="celular" id="celular" class="form-control" placeholder="427 555 5555" required >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Telefono</label>
                    <div class="col-md-5">
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="427 555 5555" >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Correo</label>
                    <div class="col-md-5">
                        <input type="text" name="email" id="email" class="form-control" placeholder="cliente@hotmail.com" >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Dirección *</label>
                    <div class="col-md-5">
                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required >
                    </div>
                </div>
            
            </div>
            <!-- END First Step -->

            <!-- Second Step -->
            <div id="clickable-second" class="step">
                <!-- Step Info -->
                @include('ventas.partes.stepInfo2')
                
                <!-- END Step Info -->
                
                

                <!-- Buscador de viajes -->
                                    
                                    
                                                        
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Busca el viaje en la Base de datos</legend>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="example-select2">Elige el viaje</label>
                                                <div class="col-md-6">
                                                    <select id="buscadorDestino" name="buscadorDestino" class="select-select2" style="width: 100%;" data-placeholder="Elige el viaje..">
                                                        <option></option>
                                                        {!!\Sv\viajes::Html()!!}
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>  
                <!-- Buscador de viajes fin// -->


                <!-- Buscador de clientes fin// -->
                <div class="col-md-6 col-sm-offset-4">
                    <div class=" row pull-right" style="margin-right: 5px;">
                        
                        <a href="javascript:void(0)" id="bt_viajesel" class="btn btn-sm btn-info">Seleccionar</a>
                       
                    </div>
                </div>
                <!-- END Step Info -->


                <!-- Boletos -->
                <div class="form-group">
                    
                    <label class="col-md-4 control-label">Destino</label>
                    <div class="col-md-6">
                        <input type="hidden" id="idViaje" name="idViaje" class="form-control" >  
                        <input type="text" id="destino"  class="form-control" readonly required>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Boletos Disponibles</label>
                    <div class="col-md-6">
                        <input type="text" id="boldis" class="form-control" readonly required>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Fecha y hora de salida</label>
                    <div class="col-md-6">
                        <input type="text" id="fhs" class="form-control" readonly required>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Fecha y hora de regreso</label>
                    <div class="col-md-6">
                        <input type="text" id="fhr" class="form-control" readonly required>  
                    </div>
                </div>
                <div id="content">
                        <label class = "col-md-4 control-label">Cuantos pasajeros viajarán?</label>
                        
                        <div class="col-md-6 col-md-offset-4 ">
                            <table  class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <td>Boleto</td>
                                        <td>Precio (M/N) $</td>
                                        <td>Cantidad</td>
                                        <td>Total (M/N) $</td>
                                    </tr>
                                </thead>
                                <tbody id="tabla">
                                   
                                </tbody>
                            </table >
                            <table class="table table-bordered">
                                <tr>
                                    <td>Pasajeros Totales</td><td id="sumPasajeros"></td>
                                </tr>
                                <tr><td>Costo total del contrato</td><td id="sumTotal"></td></tr>
                            </table><input type="hidden" name="numeroPersonas"  id="pasajerosTotales">
                        </div>
                    </div>
                <!--End Boletos -->
            </div>
            <!-- END Second Step -->

            <!-- Third Step -->
            <div id="clickable-third" class="step">
                <!-- Step Info -->
                @include('ventas.partes.stepInfo3')
                
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" >Ultimo numero de contrato generado</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{\Sv\ventas::ultimo()}} " readonly>  
                    </div>
                    <label class="col-md-4 control-label" >Numero de Contrato*</label>
                    <div class="col-md-6">
                        <input type="text" id="folio" name="folio" class="form-control" required>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >SubTotal (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="subTotal" name="subTotal" class="form-control" required readonly>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Descuento (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="descuento" name="descuento" class="form-control" min="0" value="0" onchange="calcular_descuento(this);"
                        onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();">  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Total a Pagar (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="totalPagar" name="totalPagar" class="form-control" required readonly>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Cantidad a abonar (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="abono" min="0" name="abono" class="form-control" onchange="calcular_abonar(this);"
                        onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" required>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Restan a Pagar (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="restanActualmente" name="restanActualmente" class="form-control" value="0" required readonly>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-bio">Notas</label>
                    <div class="col-md-6">
                        <textarea id="example-clickable-bio" name="comentario" rows="6" class="form-control" placeholder="..."></textarea>
                        
                    </div>
                </div>
                
               
            </div>
            <!-- END Third Step -->

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                <div class="col-md-8 col-md-offset-4">
                    <button type="reset" class="btn btn-sm btn-warning" id="back4">Regresar</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="next4">Siguiente</button>
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Clickable Wizard Content -->
    </div>
    <!-- END Clickable Wizard Block -->


                               
                <script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVentas").style.display = "block";
                    document.getElementById("nuevaVenta").className = "active "; 
                    document.getElementById("nVta").className = "active "; 
                </script>
                @include('ventas.partes.jquery')
                 <script>
                    $(document).on("wheel", "input[type=number]", function (e) {
                    $(this).blur();
                });
                </script>

@endsection