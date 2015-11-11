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

			$cssface=array('css/bootstrap.min.css','css/plugins.css','css/main.css','css/themes.css','fancy/source/jquery.fancybox.css');
			foreach($cssface as $url)

			{
				echo '<link rel="stylesheet" href="'.asset_url($url).'" />';
			}
			
			echo '<script src="'.asset_url('js/vendor/modernizr-respond.min.js').'"></script>';
			
		?>

    </head>
	<?php 
		$jsface=array('js/vendor/jquery-1.11.2.min.js','js/vendor/bootstrap.min.js','js/plugins.js','js/app.js','js/pages/index.js','js/readmore.min.js','fancy/source/jquery.fancybox.js');
		foreach($jsface as $url)
		{
			echo '<script src="'.asset_url($url).'"></script>';
		} 	
	?>
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
                <!-- Alternative Sidebar -->
                <!-- Main Sidebar -->

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
                   
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
						<?php $this->load->view($v); ?>
                    </div>
                    <!-- END Page Content -->

                </div>
                <!-- END Main Container -->
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
		
        <script>$(function(){ Index.init(); });</script>
    </body>
</html>

