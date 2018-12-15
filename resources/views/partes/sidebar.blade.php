<div id="sidebar">
                    
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="{{\Sv\datapag::ver('Url')}}" class="sidebar-brand">
                                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong> {{\Sv\datapag::ver('NomE')}} </strong></span>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="{{\Sv\datapag::ver('Url')}}">
                                        <img src="img/placeholders/avatars/avatar.jpg" alt="avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name"> {{\Sv\Usuarios::mi('Nom') }} </div>
                                <div class="sidebar-user-links">
                                    <a href="usuario-ver-{{\Sv\Usuarios::mi('id') }}" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                    
                                    <a href="usuario-modificar-{{\Sv\Usuarios::mi('id') }}" data-toggle="tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                                    <a href="logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                                </div>
                            </div>
                            <!-- END User Info -->

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="{{\Sv\datapag::ver('Url')}}" id="dashboard"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="#" id="seccionVenta" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-usd sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Ventas</span></a>
                                    <ul id="listaVentas">
                                        {!! \Sv\Privilegios::mostrarHTML(20) !!}
                                        
                                        {!! \Sv\Privilegios::mostrarHTML(21) !!}
                                            <li>
                                                <a id="ventasDisponibles" href="ventas-mias">Tus ventas</a>
                                            </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" id="seccionViaje" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-bus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Viajes</span></a>
                                    <ul id="listaViaje">
                                        {!! \Sv\Privilegios::mostrarHTML(14) !!}
                                        
                                        {!! \Sv\Privilegios::mostrarHTML(15) !!}
                                            <li>
                                                <a id="viajesDisponibles" href="viajes-disponibles">Viajes Disponibles</a>
                                            </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" id="seccionCliente" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-handshake-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clientes</span></a>
                                    <ul id="listaCliente">
                                        {!! \Sv\Privilegios::mostrarHTML(9) !!}
                                        
                                        {!! \Sv\Privilegios::mostrarHTML(10) !!}
                                            <li>
                                                <a id="misClientes" href="mis-clientes-{{\Sv\Usuarios::mi('id')}}">Ver mis clientes</a>
                                            </li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="#" id="seccionUsuario" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-id-card-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Usuarios</span></a>
                                    <ul id="listaUsuario">
                                        {!! \Sv\Privilegios::mostrarHTML(5) !!}
                                        {!! \Sv\Privilegios::mostrarHTML(2) !!}
                                            <li>
                                                <a id="misDatos" href="usuario-modificar-{{\Sv\Usuarios::mi('id')}}">Modificar Mis datos</a>
                                            </li>
                                    </ul>
                                </li>
                                
                                {!! \Sv\Privilegios::mostrarHTML(0) !!}
                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>

                