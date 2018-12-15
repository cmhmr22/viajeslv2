@extends('plantilla.p')
@section('titulo', 'Sistema Dygitec - Pagina Principal')
               
@section('design')
                    <!-- Page content -->
                    @include('partes.dashboardHeader')
                    @include('partes.mensajes')
                        
                        

                        <!-- Quick Stats -->
                        <div class="row text-center">
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background">
                                        <h4 class="widget-content-light"><strong>Contratos Realizados</strong> esta semana</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 animation-expandOpen">{{\Sv\ventas::D_V_por_usuario(\Sv\Usuarios::mi('id'), 'estUsuSem')}} </span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Contratos Realizados</strong> este mes</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">
                                    {{\Sv\ventas::D_V_por_usuario(\Sv\Usuarios::mi('id'), 'estUsuMes')}} 
                                    </span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Comosiones Generadas</strong> esta Semana</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">Proximamente</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Comosiones Generadas</strong> este Mes</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">Proximamente</span></div>
                                </a>
                            </div>
                        </div>
                        <!-- END Quick Stats -->

                        <!-- eShop Overview Block -->
                        <div class="block full">
                            <!-- eShop Overview Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                   
                                </div>
                                <h2><strong>Datos</strong> de nuestros viajes</h2>
                            </div>
                            <!-- END eShop Overview Title -->

                            
                        <!-- Orders and Products -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Latest Orders Block -->
                                <div class="block">
                                    <!-- Latest Orders Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2>Ultimos <strong>movimientos</strong> realizados</h2>
                                    </div>
                                    <!-- END Latest Orders Title -->

                                    <!-- Latest Orders Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <tbody>
                                            {!!\Sv\bitacora::htmlDash()!!}
                                        </tbody>
                                    </table>
                                    <!-- END Latest Orders Content -->
                                </div>
                                <!-- END Latest Orders Block -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Top Products Block -->
                                <div class="block">
                                    <!-- Top Products Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Proximos </strong> Viajes</h2>
                                    </div>
                                    <!-- END Top Products Title -->

                                    <!-- Top Products Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <tbody>
                                             {!!\Sv\viajes::top()!!}
                                        </tbody>
                                    </table>
                                    <!-- END Top Products Content -->
                                </div>
                                <!-- END Top Products Block -->
                            </div>
                        </div>
                        <!-- END Orders and Products -->
                    </div>
                    <!-- END Page Content -->

<script >
    document.getElementById("dashboard").className = "active ";
    document.getElementById("dash").className = "active ";
</script>
                <script src="js/vendor/jquery.min.js"></script>
                    <script src="js/moment.js"></script>
                    <script src="js/moment-with-locales.min.js"></script>
                    <script >/// formatea la fecha a una mas comprensible
                        moment.locale('es');
                        for (var i = 1; i <= 100; i++) {
                            if (document.getElementById(i+'r') instanceof Object) 
                            {
                                t= $('#'+i).val();
                                $('#'+i+'s').append(moment(t).format('LL'));
                                t= $('#'+i+'r').val();

                                $('#'+i+'rs').append(moment(t).startOf('minutes').fromNow());
                                
                            }else{ break; }
                        }
                

                    </script>
@endsection
                    