@extends('plantilla.p')
@section('titulo', 'Modificar Viaje')
@section('design')
<!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2>Modificar Viaje <strong>{{$v['destino']}}</strong></h2>
        </div>
        <!-- END Clickable Wizard Title -->

        @include('partes.mensajes')
                                   
        <!-- Clickable Wizard Content -->
        <form id="advanced-wizard" action="modVia" method="post" class="form-horizontal form-bordered">
            <!-- First Step -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>1. Destino y Fechas</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Precios y Asientos</strong></a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" ">Destino *</label>
                    <div class="col-md-5">
                        <input type="text" name="destino" class="form-control" placeholder="Nuestro proximo viaje es a..." value="{{$v['destino']}}" required>

                    </div>
                </div>
                <!--Salida -->

                <div class="form-group">
                    <label class="col-md-4 control-label" ">Salida y Regreso *</label>
                    <div class="col-md-5">
                                <div class="input-group input-daterange" data-date-format="yyyy-mm-dd">
                                    <input type="text" id="fechaSalida" name="fechaSalida" class="form-control text-center" placeholder="Salida" value="{{$v['fechaSalida']}}">
                                    <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                    <input type="text" id="fechaRegreso" name="fechaRegreso" class="form-control text-center" placeholder="Regreso" value="{{$v['fechaRegreso']}}" require>
                                </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" ">Hora de Salida</label>
                    <div class="col-md-5">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text" name="horaSalida" class="form-control input-timepicker24" value="{{$v['horaSalida']}}">
                            <span class="input-group-btn">
                                <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                            </span>
                        </div>
                    </div>
               
                    <label class="col-md-4 control-label" ">Hora de Regreso</label>
                    <div class="col-md-5">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text"  name="horaRegreso" class="form-control input-timepicker24" value="{{$v['horaRegreso']}}">
                            <span class="input-group-btn">
                                <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                            </span>
                        </div>
                    </div>
                
                </div>
                <!--Regreso -->



            </div>
            <!-- END First Step -->

            <!-- Second Step -->
            <div id="clickable-second" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. Destino y Fechas</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Precios y Asientos</strong></a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" >Asientos disponibles *</label>
                    <div class="col-md-5">
                        <input min="1" type="number" name="asientosDisponibles" class="form-control" placeholder="" value="{{$v['asientosDisponibles']}}" required>
                        <span class="help-block">Puedes cambiar la cantidad mas adelante</span>
                    </div>
                </div>
                <!-- Boletos -->
                <div class="form-group">
                    
                    <label class="col-md-4 control-label" >Boleto</label>
                    <div class="col-md-5">

                        <input type="text" id="boleto" class="form-control" placeholder="Tipo de boleto, General, Menores a 3 años, 3ra edad, Etc...">
                        
                    </div>
                    
                    <label class="col-md-4 control-label" >Precio (Peso MX $)</label>
                    <div class="col-md-5">

                        <input min="0" type="number" id="precio" class="form-control" placeholder="$250.00">
                        
                    </div>
      

                    <div id="content">
                        <label class = "col-md-4 control-label">Agregar a la tabla</label>
                        <div class="col-md-5">
                            <a href="javascript:void(0)" id="bt_add" class="btn btn-sm btn-success">Agregar</a>
                            <a href="javascript:void(0)" id="bt_del" class="btn btn-sm btn-warning">Eliminar</a>
                            <a href="javascript:void(0)" id="bt_delall" class="btn btn-sm btn-danger">Eliminar todo</a>
                            <span class="help-block">IMPORTANTE! Escribe los detalles del boleto, una vez finalizado da click en agregar para colocarlo en la lista de boletos.</span>
                        </div>

                        <div class="col-md-5 col-md-offset-4 ">
                            <table id="tabla" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nº</td>
                                        <td>Boleto</td>
                                        <td>Precio</td>
                                    </tr>
                                </thead>
                                {!! \Sv\boletos::listar($v['id'],'html') !!}
                            </table>
                        </div>
                    </div>

                </div>
                <!--End Boletos -->
            </div>
            <!-- END Second Step -->

          

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                <input type="hidden" name="id" value="{{$v['id']}}" id="token">
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
                    document.getElementById("seccionViaje").className = "open";
                    document.getElementById("listaViaje").style.display = "block";
                </script>
                <script src="js/vendor/jquery.min.js"></script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/formsWizard.js"></script>
                <script>$(function(){ FormsWizard.init(); });</script>

                <!-- para el agregado dinamico de boletos-->
                <style>
                    

                    .selected{
                        cursor: pointer;
                    }
                    .selected:hover{
                        background-color: #0585C0;
                        color: white;
                    }
                    .seleccionada{
                        background-color: #0585C0;
                        color: white;
                    }
                </style>
                  <script>
                    $(document).ready(function(){
                        $('#bt_add').click(function(){
                            agregar();
                        });
                        $('#bt_del').click(function(){
                            eliminar(id_fila_selected);
                        });
                        $('#bt_delall').click(function(){
                            eliminarTodasFilas();
                        });
                        

                    });
                    var cont=0;
                    var id_fila_selected=[];
                    function agregar(){
                        boleto= $('#boleto').val();
                        precio= $('#precio').val();

                        if(boleto != "" && precio != "")
                        {

                            cont++;
                            var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);"><td>'+cont+'</td><td>'+boleto+'</td><td>$'+precio+'<input type="hidden" name="'+cont+'" value="'+boleto+'@'+precio+'@sinid"></td></tr>';
                            $('#tabla').append(fila);
                            reordenar();

                            $('#boleto').val('');
                            $('#precio').val('');
                            $('#boleto').focus();
                        }
                        else
                        {
                            alert("Las casillas no pueden estar vacias");
                        }
                    }

                    function seleccionar(id_fila){
                        if($('#'+id_fila).hasClass('seleccionada')){
                            $('#'+id_fila).removeClass('seleccionada');
                        }
                        else{
                            $('#'+id_fila).addClass('seleccionada');
                        }
                        //2702id_fila_selected=id_fila;
                        id_fila_selected.push(id_fila);
                    }

                    function eliminar(id_fila){
                        /*$('#'+id_fila).remove();
                        reordenar();*/
                        for(var i=0; i<id_fila.length; i++){
                            $('#'+id_fila[i]).remove();
                        }
                        reordenar();
                    }

                    function reordenar(){
                        var num=1;
                        $('#tabla tbody tr').each(function(){
                            $(this).find('td').eq(0).text(num);
                            num++;
                        });
                    }
                    function eliminarTodasFilas(){
                $('#tabla tbody tr').each(function(){
                            $(this).remove();
                        });

                    }


               
                    $(document).on("wheel", "input[type=number]", function (e) {
                    $(this).blur();
                });
                </script>
@endsection