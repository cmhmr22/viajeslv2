<div class="block">
                                     <div class="block-title">
                                        
                                        <h2><strong>Tus contratos realizados</strong> </h2>
                                    </div>
                                            <!-- Table Responsive Header -->
                                <div class="content-header">
                                    <div class="header-section">
                                        <h1>
                                            <i class="gi gi-iphone"></i>Contratos para {{$destino}}<br><small>Tabla de contratos que haz realizado por para este viaje</small>
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
                                               
                                                {!!\Sv\ventas::buscarxUsu($v['id'], \Sv\Usuarios::mi('id'))!!}
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    </div>