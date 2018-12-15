@extends('plantilla.p')
@section('titulo', 'Prospecto añadido a la Base de Datos !')
@section('design')
<!-- Clickable Wizard Block -->
    <!-- Error Container -->
        <div id="container">
            <div class="error-options">
                <h3><i class="fa fa-chevron-circle-left text-muted"></i> <a href="{{\Sv\datapag::ver('Url')}}">Regresar</a></h3>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 style="color:green; font-size: 3.5em;">Nuevo prospecto añadido!<i class=" fa fa-handshake-o text-success animation-pulse"></i></h1>
                    <h2 class="h3">¿Que sigue?..</h2>
                </div>
               
            </div>
        
            <div class="row">
            	<hr>
                           
                            <div class="col-sm-4 col-lg-4">
                                <a href="contrato-asignar-{{$id}} " class="widget widget-hover-effect4 themed-background" style="background-color:green; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Asignar contrato</strong>
                                            <small>Genera un nuevo contrato para este cliente</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-4 col-lg-4">
                                <a href="{{\Sv\datapag::ver('Url')}}/cliente-nuevo" class="widget widget-hover-effect4 themed-background" style="background-color:blue; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Generar nuevo prospecto</strong>
                                            <small>Crea un nuevo prospecto para el sistema</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <a href="{{\Sv\datapag::ver('Url')}}" class="widget widget-hover-effect4 themed-background" style="background-color:red; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Regresar al menu principal</strong>
                                            <small>Recuerda darselo a tu cliente</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            

                            
                        </div>
        </div>

                <script >
                    document.getElementById("seccionCliente").className = "open";
                    document.getElementById("listaCliente").style.display = "block";
                    document.getElementById("nuevoCliente").className = "active "; 
                </script>
                
             

@endsection