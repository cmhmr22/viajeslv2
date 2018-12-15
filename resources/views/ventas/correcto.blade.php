@extends('plantilla.p')
@section('titulo', 'Contrato Generado !')
@section('design')
<!-- Clickable Wizard Block -->
    <!-- Error Container -->
        <div id="container">
            <div class="error-options">
                <h3><i class="fa fa-chevron-circle-left text-muted"></i> <a href="{{\Sv\datapag::ver('Url')}}">Regresar</a></h3>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 style="color:green; font-size: 3.5em;">Nuevo contrato generado!<i class=" fa fa-handshake-o text-success animation-pulse"></i></h1>
                    <h2 class="h3">¿Que sigue?..</h2>
                </div>
               
            </div>
        
            <div class="row">
            	<hr>
                           
                            <div class="col-sm-6 col-lg-6">
                                <a href="pdf-venta-{{$id}} " class="widget widget-hover-effect4 themed-background" style="background-color:green; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Imprimir contrato generado</strong>
                                            <small>Recuerda guardar una copia</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <a href="pdf-recibo-{{$id}}" class="widget widget-hover-effect4 themed-background" style="background-color:blue; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Imprimir Recibo de pago</strong>
                                            <small>Recuerda darselo a tu cliente</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-lg-6">
                                <a href="venta-ver-{{$id}}" class="widget widget-hover-effect4 themed-background" style="background-color:red; ">
                                    <div class="widget-simple">
                                        
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ver contrato</strong>
                                            <small>Contrato recientemente generado</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-lg-6">
                                <a href="venta-modificar-{{$id}}" class="widget widget-hover-effect4 themed-background" style="background-color:orange; ">
                                    <div class="widget-simple">

                                        <h4 class="widget-content widget-content-light">
                                            <strong>Modificar datos de contrato</strong>
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
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVentas").style.display = "block";
                   
                </script>
                
             

@endsection