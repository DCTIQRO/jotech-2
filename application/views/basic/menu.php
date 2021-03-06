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
						<!-- Modulo Clientes -->
                        <li class="sidebar-header">
                            <span class="sidebar-header-title">Mi cuenta</span>
                        </li>
						<li>
                            <a href="<?= site_url('tareas/mis_tareas') ?>"><i class="fa fa-flag sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Mis Tareas</span></a>
                        </li>
						<!--<li>
                            <a href="<?= site_url('recordatorios') ?>"><i class="fa fa-flag sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Recordatorios</span></a>
                        </li>-->
						<li>
                            <a href="javascript:void(0)"><i class="fa fa-flag sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Perfil</span></a>
                        </li>
						<li>
                            <a href="<?= site_url('auth/logout') ?>"><i class="gi gi-charts sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Cerrar Sesión</span></a>
                        </li>
						
						<?php 
							$this->db->select('*');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if(!empty($pantalla)){
						?>
						<!-- Modulo Proyectos -->
						<li class="sidebar-header">
                            <span class="sidebar-header-title">Datos</span>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Proyectos');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Proyectos == 1)$oculto="";
						?>
						<li class="<?= $oculto ?>">
                            <a href="<?= site_url('proyectos') ?>"><i class="fa fa-cogs sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Proyectos</span></a>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Tareas');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Tareas == 1)$oculto="";
						?>
						<li class="<?= $oculto ?>">
                            <a href="<?= site_url('tareas') ?>"><i class="fa fa-cogs sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tareas</span></a>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Contactos');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Contactos == 1)$oculto="";
						?>
						<li class="<?= $oculto ?>">
                            <a href="<?= site_url('contactos') ?>"><i class="fa fa-cogs sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contactos</span></a>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Clientes');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Clientes == 1)$oculto="";
						?>
						<li class="<?= $oculto ?>">
                            <a href="<?= site_url('clientes') ?>"><i class="fa fa-users sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clientes</span></a>
						</li>
						
						<?php 
							$oculto="hidden"; 
							$this->db->select('Historial');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Historial == 1)$oculto="";
						?>
						<li class="<?= $oculto ?>">
                            <a href="<?= site_url('historial') ?>"><i class="fa fa-users sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Historial</span></a>
						</li>
						
						<!-- Modulo Proyectos -->
						<li class="sidebar-header">
                            <span class="sidebar-header-title">Administración</span>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Usuarios');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Usuarios == 1)$oculto="";
						?>
                        <li class="<?= $oculto ?>">
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
						<?php 
							$oculto="hidden"; 
							$this->db->select('Clasificaciones');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Clasificaciones == 1)$oculto="";
						?>
						<li class="<?= $oculto ?>">
                            <a href="<?= site_url('clasificaciones_clientes') ?>"><i class="fa fa-cubes sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clasificaciónes</span></a>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Papelera');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Papelera == 1)$oculto="";
						?>
						<li  class="<?= $oculto ?>">
                            <a href="<?= site_url('papelera') ?>"><i class="fa fa-cubes sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Papelera</span></a>
                        </li>
						<?php 
							$oculto="hidden"; 
							$this->db->select('Pantallas');
							$this->db->where('user_id',$this->session->userdata('user_id'));
							$pantalla=$this->db->get('Pantallas')->row();
							if($pantalla->Pantallas == 1)$oculto="";
						?>
						<li  class="<?= $oculto ?>">
                            <a href="<?= site_url('pantallas') ?>"><i class="fa fa-cubes sidebar-nav-icon sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Permisos Menú</span></a>
                        </li>
							<?php } ?>
                    </ul>
                    <!-- END Sidebar Navigation -->
                    
                    
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>