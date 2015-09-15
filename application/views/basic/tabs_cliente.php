<ul class="breadcrumb breadcrumb-top">
	<a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>" Style="float:left; margin-right:100px; padding-top:10px"><?= $datos_cliente->nombre ?></a>
	<ul class="nav nav-pills">
		<li><a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>">Detalles</a></li>
		<li class="active"><a href="<?= site_url('proyectos/cliente/'.$datos_cliente->id) ?>">Proyectos</a></li>
		<li><a href="<?= site_url('tareas/cliente/'.$datos_cliente->id) ?>">Tareas</a></li>
		<li><a href="<?= site_url('clientes/contacto/'.$datos_cliente->id) ?>">Contactos</a></li>
		<li><a href="<?= site_url('bitacora/cliente/'.$datos_cliente->id) ?>">Bitacora</a></li>
	</ul>
</ul> 
<div class="row">
	<div class="col-xs-12">
		<div class="block-section">
			<h4 class="sub-header"><?= $titulo ?></h4>
			<ul class="nav nav-tabs">
				<?php $activo=""; if($tab == 'detalles'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('clientes/ver/'.$id_cliente) ?>">Detalles</a></li>
				<?php $activo=""; if($tab == 'proyec_tarea'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('proyectos/cliente/'.$id_cliente) ?>">Proyectos</a></li>
				<?php $activo=""; if($tab == 'tarea_vista'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('tareas/cliente/'.$id_cliente) ?>">Tareas Cliente</a></li>
				<?php $activo=""; if($tab == 'contacto'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('clientes/contacto/'.$id_cliente) ?>">Contacto</a></li>
				<?php $activo=""; if($tab == 'bitacora'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('bitacora/cliente/'.$id_cliente) ?>">Bitacora</a></li>
				<?php $activo=""; if($tab == 'Permisos'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="javascript:void(0)">Permisos</a></li>
			</ul>
		</div>
	</div>
</div>