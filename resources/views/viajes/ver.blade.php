@extends('plantilla.p')
<?php $destino = \Sv\viajes::buscar($v['id'] ,'destino'); ?>
@section('titulo', $destino)
@section('design')

<div class="row">
<!-- Second Column -->
                            <div class="col-md-4 col-lg-4">
                                <!-- Info Block -->
                                @include('viajes.partes.tablaDestino')
                                
                                <!-- END Info Block -->

                                <!-- Twitter Block -->
                                @include('viajes.partes.ultimosMovimientos')
                                
                                <!-- END Twitter Block -->

                                <!-- Photos Block 
                               @ include('viajes.partes.photos')
                                
                                 END Photos Block -->

                            </div>
                            <!-- END Second Column -->

<!-- Segunda Column -->
                            <div class="col-md-8 col-lg-8">

                                <div class="block">
                                    <div class="block-title">
                                        <h2>Descripcion del <strong>Itinerario</strong></h2>
                                        <div class="block-options pull-right">
                                            <a href="viaje-descripcion-{{$v['id']}}" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Cambiar Descripcion o lugar de salida"><i class="fa fa-pencil"></i></a>
                                        </div>
                                    </div>
                                    <strong>Lugar de salida: </strong>{{$v['lugarSalida']}}
                                    <hr>
                                   {!!$v['descripcion']!!}
                                </div>
                                <!-- ventas -->
                                @if(\Sv\Privilegios::verificar(19) == 0)
                                @include('viajes.partes.tablaAdmin')
                                @endif
                                <!-- end ventas -->

                                <!-- Updates Block 
                                @ include('viajes.partes.feed')
                                 END Newsfeed Block -->

                                 <!-- ventas -->
                                 @include('viajes.partes.tablaMisVentas')
                                
                            <!-- END First Column -->
                                
                            </div>
</div>
                <script >
                    document.getElementById("seccionViaje").className = "open";
                    document.getElementById("listaViaje").style.display = "block";
                </script>
                
@endsection