<!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->

                    <header id="headertheme" class="navbar navbar-default">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                            
                        </ul>
                        <!-- END Left Header Navigation -->

                       
                        
                       
                        <!-- END Right Header Navigation -->
                    </header>
                    @if(\Sv\datapag::ver('HTheme') == 1)
                            <script>
                                document.getElementById("headertheme").className = "navbar navbar-default "; 
                               
                            </script>
                            @else
                            <script>
                                document.getElementById("headertheme").className = "navbar navbar-inverse"; 
                                
                            </script>
                        @endif