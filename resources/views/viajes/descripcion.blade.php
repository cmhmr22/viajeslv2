@extends('plantilla.p')
@section('titulo', 'Agregar descripcion')
@section('design')

<div class="block">
        <!-- Horizontal Form Title -->
        <div class="block-title">
                                        
            <h2><strong>Descripción del viaje</strong> (Llena cuidadosamente el formulario)</h2>

        </div>
        <!-- END Horizontal Form Title -->
        <!--Mensajes que aparecen despues de que se realiza una accion-->
            @include('partes.mensajes')
            <!--Mensajes que aparecen despues de que se realiza una accion-->
        <!-- Horizontal Form Content -->
        <form action="vmoddesc" method="post" class="form-horizontal form-bordered">
                <h4 class="text-center"><strong>Viaje: </strong>{{$v['destino']}}</h4>
                <div class="form-group">
                    <label class="col-md-2 control-label" >Lugar de salida</label>
                    <div class="col-md-10">
                        <input  type="text" name="lugarSalida" value="{{$v['lugarSalida']}}" class="form-control" placeholder="">
                        <span class="help-block">Lugar de salida (puedes cambiarlo mas adelante)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-clickable-bio">Itinerario</label>
                    <div class="col-md-10">
                         
                                            
                        <textarea id="textarea-ckeditor" name="descripcion" class="ckeditor">{!!$v['descripcion']!!} </textarea>
                                         
                        
                        <span class="help-block">Solo lo veran los asesores.</span>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                        <input type="hidden" name="id" value="{{$v['id'] }}" >

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Guardar información</button>
                       
                        <a href="viaje-ver-{{$v['id'] }}"> <strong class="btn btn-sm btn-success pull-right"> Regresar a descripcion</strong></a>
                    </div>
                </div>
        </form>        
 </div>
 <script src="js/helpers/ckeditor/ckeditor.js"></script>
 @endsection