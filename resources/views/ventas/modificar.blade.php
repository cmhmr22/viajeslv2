@extends('plantilla.p')
@section('titulo', 'Modificar venta')
@section('design')

<!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2>Modificar <strong>Contrato</strong></h2>
        </div>
        <!-- END Clickable Wizard Title -->

        @include('partes.mensajes')
                                   
        <!-- Clickable Wizard Content -->
        <form id="advanced-wizard" action="modVnta" method="post" class="form-horizontal form-bordered">
            <!-- First Step -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
               @include('ventas.partes.stepInfo1')



                <!-- END Step Info -->
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Nombre del cliente </label>
                    <div class="col-md-5">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del cliente" value="{{\Sv\clientes::buscar($v['idCliente'],'nombre')}} " required >
                    </div> 
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Celular </label>
                    <div class="col-md-5">
                        <input type="text" name="celular" id="celular" class="form-control" placeholder="427 555 5555" value="{{\Sv\clientes::buscar($v['idCliente'],'celular')}}" required >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Telefono</label>
                    <div class="col-md-5">
                        <input type="text" name="telefono" id="telefono" value="{{\Sv\clientes::buscar($v['idCliente'],'telefono')}}" class="form-control" placeholder="427 555 5555"  >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Correo</label>
                    <div class="col-md-5">
                        <input type="text" name="email" id="email" class="form-control" placeholder="cliente@hotmail.com" value="{{\Sv\clientes::buscar($v['idCliente'],'email')}}" >
                    </div>
                </div>
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Dirección</label>
                    <div class="col-md-5">
                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{\Sv\clientes::buscar($v['idCliente'],'direccion')}}" required >
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
                                                    <select id="buscadorDestino" name="buscadorDestino" class="select-select2" style="width: 100%;"  data-placeholder="Elige el viaje..">
                                                        <option value="{{$v['idViaje']}}">{{\Sv\viajes::buscar($v['idViaje'], 'destino')}}</option>
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
                        <input type="hidden" id="idVenta" name="idVenta" value="{{$v['id']}}" class="form-control" >  
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
                                    <td>Pasajeros Totales</td><td id="sumPasajeros">{{$v['numeroPersonas']}} </td>
                                </tr>
                                <tr><td>Costo total del contrato</td><td id="sumTotal">{{$v['subTotal']}}</td></tr>
                            </table><input type="hidden" name="numeroPersonas" value="{{$v['numeroPersonas']}}" id="pasajerosTotales">
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
                    
                    <label class="col-md-4 control-label" >Numero de Contrato*</label>
                    <div class="col-md-6">
                        <input type="text" value="{{$v['folio']}}" id="folio" name="folio" class="form-control">  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >SubTotal (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="subTotal" name="subTotal" value="{{$v['subTotal']}}" class="form-control" required readonly>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Descuento (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="descuento" name="descuento" class="form-control" min="0" value="{{$v['descuento']}}" onchange="calcular_descuento(this);"
                        onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();">  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Total a Pagar (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="totalPagar" name="totalPagar" class="form-control" value="{{$v['totalPagar']}}" required readonly>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Total Abonado (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="totalAbonado" name="totalAbonado" class="form-control" value="{{\Sv\pagos::abonado($v['id'])}}"  readonly>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Cantidad a abonar (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="abono" name="abono" class="form-control" min="0" value="0"onchange="calcular_abonar(this);"
                        onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" required>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Restan a Pagar (M/N) $</label>
                    <div class="col-md-6">
                        <input type="number" id="restanActualmente" name="restanActualmente" class="form-control" value="{{$v['restanActualmente']}}" required readonly>  
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
               </script>
                
                 <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/formsWizard.js"></script>
                <script>$(function(){ FormsWizard.init(); });</script>

              
                  <script>
                    $(document).ready(function(){
                        bloquear();

                        boletosListar();
                        rell_viaje();
                        
                        $('#bt_viajesel').click(function(){
                            boletosListar();
                            rell_viaje();

                        });
                        
                        
                    });
                    
                    function calcular_abonar(){//Realiza el descuento
                            
                            var sumaAbono = 0;
                            sumaAbono =parseInt(document.getElementById("totalPagar").value)-parseInt(document.getElementById("totalAbonado").value)-parseInt(document.getElementById("abono").value);
                                     
                            
                            document.getElementById("restanActualmente").value =sumaAbono;
                            
                    }
                    function calcular_descuento(){//Realiza el descuento
                            
                            var sumDescuento = 0;
                            sumDescuento =parseInt(document.getElementById("subTotal").value)-parseInt(document.getElementById("descuento").value);
                                     
                            
                            document.getElementById("totalPagar").value =sumDescuento;
                            document.getElementById("restanActualmente").value =sumDescuento-parseInt(document.getElementById("totalAbonado").value)-parseInt(document.getElementById("abono").value);
                            
                    }
                    function calcular(elem){
                         let suid = elem.id;
                             nid = suid.replace("@cantidad", ""); //obtiene el id
                             //alert(nid);

                         let suval = elem.value;
                         let res = suval*document.getElementById(nid+"@costo").value;
                            document.getElementById(nid+"@total").value =res;
                        calcular_res();
                    }

                     function calcular_res(){//hace la sumatoria de los boletos
                            let sumPasajeros = 0;
                            let sumTotal = 0;
                             for (var i = 1; i <= 100; i++) {
                               
                                 if (document.getElementById(i+"@costo") instanceof Object) 
                                 {
                                     sumTotal = parseInt(sumTotal) + parseInt(document.getElementById(i+"@total").value);
                                     sumPasajeros = parseInt(sumPasajeros) + parseInt(document.getElementById(i+"@cantidad").value);
                                     
                                 }else{break;}

                             }
                            $('#sumPasajeros').empty();
                            $('#sumPasajeros').append(sumPasajeros);
                            document.getElementById("pasajerosTotales").value =sumPasajeros;
                            $('#sumTotal').empty();
                            $('#sumTotal').append("$"+sumTotal);
                            document.getElementById("subTotal").value =sumTotal;
                            let totalPagar = sumTotal-parseInt(document.getElementById("descuento").value);
                            document.getElementById("totalPagar").value = totalPagar;
                            document.getElementById("restanActualmente").value =totalPagar-(parseInt(document.getElementById("totalAbonado").value)+parseInt(document.getElementById("abono").value));
                    }

                    //Rellenar Boletos

                    function boletosListar(){
                        if ($('#buscadorDestino').val() == "") 
                        {
                            
                            return alert("Debes seleccionar un viaje primero");
                        }

                        var ruta = '{{\Sv\datapag::ver("Url")}}'+"/lbm-"+$('#buscadorDestino').val()+'-'+$('#idVenta').val();
                        
                        $.get( ruta, function( data ) {
                          //$( ".result" ).html( data );
                          $('#tabla').empty();
                          $('#tabla').append(data);
                          //alert( "Load was performed." );
                        });
                    }
                    
                    
                    

                    //rellenar datos viaje

                    function rell_viaje(){
                        if ($('#buscadorDestino').val() == "") 
                        {
                            
                            return "";
                        }

                        var ruta = '{{\Sv\datapag::ver("Url")}}'+"/lv-"+ $('#buscadorDestino').val();
                        $.getJSON(ruta, function(respuesta)
                        { //obtiene el json, proporciona la ruta, y crea una funcion respuesta
                            //llenamos las casillas que sean necesarias con losdatos
                            
                            document.getElementById("idViaje").value = respuesta.id;
                            document.getElementById("boldis").value = respuesta.disponibles;
                            document.getElementById("destino").value = respuesta.destino;
                            document.getElementById("fhs").value = respuesta.fechaSalida+ " a las " +respuesta.horaSalida;
                            document.getElementById("fhr").value = respuesta.fechaRegreso+ " a las " +respuesta.horaRegreso;
                            
                        });//se cierra $.getJSON
                    }
                    function limpiar(){
                        $('.chosen-single').empty();
                        $('.chosen-single').append('<span></span><div><b></b></div>');
                        $('#buscarCliente').val('');
                        $('#idCliente').val('null');
                        $('#nombre').val('');
                        $('#telefono').val('');
                        $('#celular').val('');
                        $('#email').val('');
                        $('#direccion').val('');
                        modificar();
                    }
                     function modificar(){
                        
                        $("#nombre").removeAttr("readonly");
                        $("#telefono").removeAttr("readonly");
                        $("#celular").removeAttr("readonly");
                        $("#email").removeAttr("readonly");
                        $("#direccion").removeAttr("readonly");
                        
                    }
                    
                     function bloquear(){
                        
                        $("#nombre").attr("readonly","readonly");
                        $("#telefono").attr("readonly","readonly");
                        $("#celular").attr("readonly","readonly");
                        $("#email").attr("readonly","readonly");
                        $("#direccion").attr("readonly","readonly");
                        
                    }
                   

                 
                    $(document).on("wheel", "input[type=number]", function (e) {
                    $(this).blur();
                });
                </script>

@endsection