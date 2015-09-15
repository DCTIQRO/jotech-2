<ul class="breadcrumb breadcrumb-top">
	<a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>" Style="float:left; margin-right:100px; padding-top:10px"><?= $datos_cliente->nombre ?></a>
	<ul class="nav nav-pills">
		<?php $activo=""; if($tab == 'detalles'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>">Detalles</a></li>
		<?php $activo=""; if($tab == 'proyec_tarea'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('proyectos/cliente/'.$datos_cliente->id) ?>">Proyectos</a></li>
		<?php $activo=""; if($tab == 'tarea_vista'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('tareas/cliente/'.$datos_cliente->id) ?>">Tareas</a></li>
		<?php $activo=""; if($tab == 'contacto'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('clientes/contacto/'.$datos_cliente->id) ?>">Contactos</a></li>
		<?php $activo=""; if($tab == 'bitacora'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('bitacora/cliente/'.$datos_cliente->id) ?>">Bitacora</a></li>
	</ul>
</ul> 