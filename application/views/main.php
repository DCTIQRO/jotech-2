<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>Jotech</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
		
		<?php

			$cssface=array('css/bootstrap.min.css','css/plugins.css','css/main.css','css/themes.css','fancy/source/jquery.fancybox.css','css/checkbox.css','css/datatables/buttons.dataTables.min.css','css/datatables/responsive.bootstrap.min.css','css/datatables/buttons.bootstrap.min.css');
			foreach($cssface as $url)

			{
				echo '<link rel="stylesheet" href="'.asset_url($url).'" />';
			}
			
			echo '<script src="'.asset_url('js/vendor/modernizr-respond.min.js').'"></script>';
			
		?>

    </head>
	<?php 
		$jsface=array('js/vendor/jquery-1.11.2.min.js','js/vendor/bootstrap.min.js','js/plugins.js','js/app.js','js/pages/index.js','js/readmore.min.js','fancy/source/jquery.fancybox.js','js/jquery.confirm.min.js','js/datatables/dataTables.buttons.js','js/datatables/buttons.colVis.js','js/datatables/buttons.html5.js','js/datatables/dataTables.buttons.js','js/datatables/jszip.min.js','js/datatables/pdfmake.min.js','js/datatables/vfs_fonts.js','js/datatables/buttons.print.js','js/datatables/dataTables.responsive.min.js','js/datatables/ColReorderWithResize.js');
		foreach($jsface as $url)
		{
			echo '<script src="'.asset_url($url).'"></script>';
		}
		
		echo '<script src="//cdn.datatables.net/plug-ins/1.10.9/sorting/date-eu.js"></script>';
	?>
	<script type="text/javascript">
			$(document).ready(function() {
				$(".fancy").fancybox({
					maxWidth	: 1100,
					maxHeight	: 800,
					fitToView	: false,
					width		: '100%',
					height		: '85%',
					autoSize	: false,
					closeClick	: false,
					openEffect	: 'none',
					closeEffect	: 'none'
				});
			});
		</script>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            
            <div id="page-container" class="sidebar-no-animations">
                <!-- Alternative Sidebar -->

                <!-- Main Sidebar -->
				<?php $this->load->view('basic/menu'); ?>

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
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
                    <header class="navbar navbar-default">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                        </ul>
						<ul class="nav navbar-nav-custom pull-right">
							<?php
								$this->db->select('id,nombre');
								$this->db->where('status','1');
								$this->db->order_by('nombre','asc');
								$clientes = $this->db->get('clientes')->result();
							?>
							<li Style="padding-top: 8px; width: 350px;">
								<select id="buscar_cliente" onChange="buscar_cliente()" data-placeholder="Selecciona un cliente" name="buscar_cliente" class="select-chosen">
									<option></option>
									<?php
										foreach($clientes as $cliente)
										{
											echo '<option value="'.$cliente->id.'">'.$cliente->nombre.'</option>';
										}
									?>
								</select>
							</li>
							<li Style="padding-top: 8px; width: 150px;">
								<div class="col-xs-12">
									<a href="<?= site_url('clientes/nuevo_cliente') ?>" class="btn btn-sm btn-info">Agregar Cliente</a>
								</div>
							</li>
						</ul>
						<ul class="nav navbar-nav-custom pull-right">
							<li Style="padding-top: 8px; width: 150px; margin-right: 20px;">
								<div class="col-xs-12">
									<a href="<?= site_url('tareas_generales/nuevo') ?>" class="btn btn-sm btn-primary fancy fancybox.iframe">Nueva Tarea General</a>
								</div>
							</li>
						</ul>
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
						<?php $this->load->view($v); ?>
                    </div>
                    <!-- END Page Content -->

                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
		
        <script>$(function(){ Index.init(); });</script>
		<script>
			function buscar_cliente()
			{
				var pagina="<?= site_url("clientes/ver") ?>"+"/"+$('#buscar_cliente').val();
				location.href=pagina;
			}			
		</script>
    </body>
</html>