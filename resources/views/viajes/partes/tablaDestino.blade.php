<div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title">
                                        
                                        <h2>Viaje <strong>{{$destino}} </strong> </h2>
                                        @if(\Sv\Privilegios::verificar(16) == 1)
                                        <div class="block-options pull-right">
                                            <a href="viaje-modificar-{{$v['id']}}" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Modificar Viaje"><i class="fa fa-pencil"></i></a>
                                        </div>
                                        
                                        @endif
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-borderless table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Destino</strong></td>
                                                <td>{{$destino}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Salimos</strong></td>
                                                <td>{{\Sv\viajes::buscar($v['id'],'salida')}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Regresamos</strong></td>
                                                <td>{{\Sv\viajes::buscar($v['id'],'regreso')}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Lugares totales</strong></td>
                                                <td><a href="javascript:void(0)" class="label label-info">{{$v['asientosDisponibles'] }}</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Lugares disponibles</strong></td>
                                                <td><a href="javascript:void(0)" class="label label-danger">{{$v['asientosDisponibles']-\Sv\viajes::datos($v['id'],'sumViajantes') }}</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Boletos en venta</strong></td>
                                                <td>
                                                   {!!\Sv\boletos::listar($v['id'],'br')!!}
                                                </td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>