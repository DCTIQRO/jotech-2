<?php require('conect.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>QuetzalArt</title>

		<meta name="description" content="">
		<meta name="keywords" content="" />

		<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- iOS -->
		<meta name="mobile-web-app-capable" content="yes"> <!-- android -->
		<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0">
		<meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" /> <!-- android? -->
		<meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" /> <!-- iphone 5 -->
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="apple-mobile-web-app-title" content="">
		<meta name="robots" content="all" />
		<link rel="icon" type="image/png" href="favicon.png" />
        
        <!--iPhone and iPad Web App icons -->
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/AppIcon76x76@2x.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/AppIcon72x72@2x.png">
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/AppIcon60x60@2x.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/AppIcon57x57@2x.png">
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/AppIcon76x76.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/AppIcon72x72.png">
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/AppIcon60x60.png">
		<link rel="apple-touch-icon-precomposed" href="/AppIcon57x57.png">
		
		<!--Android Web App icons -->
		<link rel="shortcut icon" sizes="152x152" href="/AppIcon76x76@2x.png">
        
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="css/bootstrap.min.css">

		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme-custom.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/main.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
        
		<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" data-spy="affix" data-offset-top="20">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"></a>
				</div>
				<div id="main-nav" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">Inicio</a></li>
						<li class="current"><a href="piezas.php">Piezas</a></li>
						<li><a href="nosotros.html">Nosotros</a></li>
						<li><a href="historia.html">Historia</a></li>
						<li><a href="contacto.html">Contacto</a></li>
					</ul>
				</div>
			</div>
		</nav>


		<section id="top" class="bg-blue">
			<div class="container">
				<div class="row top-100 bottom-40 text-center">
					<h1>Piezas</h1>
				</div>
			</div>
		</section>

		<?php 
			$query="Select p.nombre producto,p.imagen,t.nombre tipo,p.lugar,p.coleccion,p.dimensiones,p.origen,c.nombre categoria,tiempo,precio,tipo_moneda,p.descripcion,p.descripcion2 FROM productos p JOIN tipo_producto t on p.idtipo_producto=t.idtipo_producto JOIN categoria c on p.idcategoria=c.idcategoria where idproductos=".$_GET['producto'];
			$results = mysql_query($query);
			$rows = mysql_fetch_assoc(@$results);
		?>
		<section class="bg-white">
			<div class="container">
				<div class="row top-40 bottom-20">
					<div class="col-sm-5 product_main">
						<!--imagenes: chica = 768 x 400, grande = 900 x lo que de-->
						<img class="visible-xs" src="Administrador/assets/uploads/productos/<?= $rows['imagen'] ?>">
						<a class="hidden-xs" href="#" data-toggle="modal" data-target="#prodModal">
							<img src="Administrador/assets/uploads/productos/<?= $rows['imagen'] ?>">
						</a>
					</div>
					
					<div class="col-sm-7 scrollfadeInRight">
						<h1 class="top-0"><?= $rows['producto'] ?></h1>
						<div class="divisor"></div>
						<ul class="list-unstyled specs top-0">
							<li><label>Colecci&oacute;n:</label><?= $rows['tipo'] ?>.</li>
							<li><label>Dimensiones:</label><?= $rows['dimensiones'] ?>.</li>
							<li><label>Origen:</label> <?= $rows['lugar'] ?>.</li>
							<li><label>Categor&iacute;a:</label> <?= $rows['categoria'] ?></li>
							<li><label>Tiempo de elaboraci&oacute;n:</label> <?= $rows['tiempo'] ?></li>
							<li><label class="precio">Precio: <span>$<?= $rows['precio'].' '.$rows['tipo_moneda'] ?></span></label></li>
							<li><a href="#" class="btn btn-warning"><i class="fa fa-lg fa-shopping-cart"></i> Comprar ahora</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section class="bg-lighter">
			<div class="container">
				<div class="row top-40 bottom-20 scrollfadeInUp">
					<div class="col-sm-6">
						<p><?= $rows['descripcion'] ?></p>
					</div>
					<div class="col-sm-6">   
						<p><?= $rows['descripcion2'] ?></p>
					</div>
				</div>
			</div>
		</section>


		<footer class="bg-darker">
			<div class="container">
				<div class="row top-40 bottom-10">
					<div class="col-sm-6">
						<img class="img-responsive" src="img/manta-footer.png">
					</div>
					<div class="col-sm-6 text-center">
						<h2>Cont&aacute;ctenos</h2>
						<p>
							Tel +52 (442) 123-4567<br>
							<a href="contacto.html" class="btn btn-default btn-lg top-40">Escr&iacute;banos aqu&iacute;</a>
						</p>
					</div>
				</div>
			</div>
		</footer>
                
		<!-- Producto Modal -->
		<div class="modal fade" id="prodModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<div class="close-videoModal">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						</div>
						<img src="img/a_01_lg.jpg" width="100%">
					</div>
				</div>
			</div>
		</div>

                
        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

		<script src="js/vendor/bootstrap.min.js"></script>

		<script src="js/vendor/viewportchecker.js"></script>
		<script src="js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
	</body>
</html>
