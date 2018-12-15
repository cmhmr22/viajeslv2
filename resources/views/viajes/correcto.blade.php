@extends('plantilla.p')
@section('titulo', 'Viaje Agregado')
@section('design')
<!-- Clickable Wizard Block -->
    <!-- Error Container -->
        <div id="container">
            <div class="error-options">
                <h3><i class="fa fa-chevron-circle-left text-muted"></i> <a href="{{\Sv\datapag::ver('Url')}}">Regresar</a></h3>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 style="color:green; font-size: 3.5em;">A viajar se a dicho!<i class="fa fa-plane text-success animation-pulse"></i></h1>
                    <h2 class="h3">¿Que sigue?..</h2>
                </div>
               
            </div>
        
            <div class="row">
            	<hr>
                           
                            <div class="col-sm-6 col-lg-3">
                                <a href="viaje-ver-{{$id}} " class="widget widget-hover-effect4 themed-background" style="background-color:red; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ver viaje</strong>
                                            <small>Podrás ver los detalles del viaje</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <a href="viajes-disponibles" class="widget widget-hover-effect4 themed-background" style="background-color:blue; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ver viajes disponibles</strong>
                                            <small>Podrás los viajes disponibles</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-lg-3">
                                <a href="viaje-nuevo" class="widget widget-hover-effect4 themed-background" style="background-color:green; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Agregar nuevo Viaje</strong>
                                            <small>Regresa al panel de agregado</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-lg-3">
                                <a href="viaje-modificar-{{$id}}" class="widget widget-hover-effect4 themed-background" style="background-color:orange; ">
                                    <div class="widget-simple">

                                        <h4 class="widget-content widget-content-light">
                                            <strong>Modificar este Viaje</strong>
                                            <small>Entrarás al panel de modificación</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            
                            
                        </div>
        </div>
        <!-- END Error Container -->
    <!-- END Clickable Wizard Block -->



                <script >
                    document.getElementById("seccionViaje").className = "open";
                    document.getElementById("listaViaje").style.display = "block";
                   
                </script>
                
             

@endsection