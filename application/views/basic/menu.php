<div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="javascript:void(0)" class="sidebar-brand text-center">
                        <span class="sidebar-nav-mini-hide"><strong><img src="<?= asset_url('img/jotech/jotech.png') ?>"></strong></span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                 <div class="sidebar-user-links">
                            <a href="page_ready_user_profile.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Profile"><i class="gi gi-user"></i></a>
                            <a href="page_ready_inbox.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Messages"><i class="gi gi-envelope"></i></a>
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->
                            <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="" onclick="$('#modal-user-settings').modal('show');" data-original-title="Settings"><i class="gi gi-cogwheel"></i></a>
                            <a href="login.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Logout"><i class="gi gi-exit"></i></a>
                        </div>
                    
                    </div>
                    <!-- END User Info -->

                   

                                        <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <li>
                            <a href="<?= site_url('clientes') ?>"><i class="fa fa-flag sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Inicio</span></a>
                        </li>
						<!-- Modulo Clientes -->
                        <li class="sidebar-header">
                            <span class="sidebar-header-title">Clientes</span>
                        </li>
                        <li>
                            <a href="<?= site_url('clientes') ?>"><i class="fa fa-users sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Todos los clientes</span></a>
						</li>
                        <li>
                            <a href="<?= site_url('clientes/nuevo_cliente') ?>"><i class="fa fa-user-plus sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Nuevo Cliente</span></a>
                        </li>
						<li>
                            <a href="<?= site_url('clasificaciones_clientes') ?>"><i class="fa fa-cubes sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clasificación Cliente</span></a>
                        </li>
                        
						<!-- Modulo Proyectos -->
						<li class="sidebar-header">
                            <span class="sidebar-header-title">Proyectos</span>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-cogs sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Listar Proyectos</span></a>
                        </li>
                        <li>
                            <a href="<?= site_url('clasificaciones_proyectos') ?>"><i class="fa fa-cubes sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clasificación Proyecto</span></a>
                        </li>
						
						<!-- Modulo Proyectos -->
						<li class="sidebar-header">
                            <span class="sidebar-header-title">Administrar</span>
                        </li>
                        <li>
							<a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-users sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Usuarios</span></a>
							<ul>
								<li>
									<a href="<?= site_url('auth/ver_usuarios') ?>">Todos los usuarios</a>
								</li>
								<li>
									<a href="<?= site_url('auth/create_user') ?>">Agregar Usuario</a>
								</li>
							</ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-title">Cuenta</span>
                        </li>
                        <li>
                            <a href="<?= site_url('auth/logout') ?>"><i class="gi gi-charts sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Cerrar Sesión</span></a>
                        </li>
                    </ul>
                    <!-- END Sidebar Navigation -->
                    
                    
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>