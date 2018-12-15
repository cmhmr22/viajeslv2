<div class="block">
                                     <div class="block-title">
                                        
                                        <h2>Tabla de <strong>ventas</strong> (De todos los usuarios) </h2>
                                    </div>
                                            <!-- Table Responsive Header -->
                                    <div class="content-header">
                                        <div class="header-section">
                                            <h1>
                                                <i class="gi gi-iphone"></i>{{$destino}}<br><small>Tabla de ventas!</small>
                                            </h1>
                                        </div>
                                    </div>
                        
                                    <!-- END Table Responsive Header -->

                            
                         
                                     <div class="table-responsive">
                                            <table class="table table-vcenter table-striped">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Nombre Cliente</th>
                                                        <th>#</th>
                                                        <th>Lugares</th>
                                                        <th>Total Pagar</th>
                                                        <th>Desc</th>
                                                        <th>Pagado</th>
                                                        <th>Restan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    {!!\Sv\ventas::buscarxID($v['id'] )!!}
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    <hr>
                                    <!-- END Responsive Full Content -->
                                    <div class="block-title">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter table-striped">
                                                <thead>
                                                    <tr>
                                                                
                                                        <th class="text-center">Contratos</th>
                                                        <th class="text-center">Viajarán</th>
                                                        <th class="text-center">Totales</th>
                                                        <th class="text-center">Total recibido</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <tr>    
                                                            <td class="text-center">
                                                            {{\Sv\viajes::datos($v['id'],'countContratos')}}
                                                            </td>
                                                            <td class="text-center">
                                                            {{\Sv\viajes::datos($v['id'],'sumViajantes')}}
                                                            </td>
                                                            
                                                            <td class="text-center">
                                                                {{\Sv\viajes::datos($v['id'],'sumTotales')}}
                                                            </td>
                                                            <td class="text-center">
                                                                {{\Sv\viajes::datos($v['id'],'calcRecaudado')}}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>