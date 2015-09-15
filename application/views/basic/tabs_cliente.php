<ul class="breadcrumb breadcrumb-top">
	<a href="<?= site_url('clientes/ver/'.$datos_cliente->id) ?>" Style="float:left; margin-right:100px; padding-top:10px"><?= $datos_cliente->nombre ?></a>
	<ul class="nav nav-pills">
		<?php $activo=""; if($tab == 'detalles'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('clientes/ver/'.id_cliente) ?>">Detalles</a></li>
		<?php $activo=""; if($tab == 'proyec_tarea'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('proyectos/cliente/'.id_cliente) ?>">Proyectos</a></li>
		<?php $activo=""; if($tab == 'tarea_vista'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('tareas/cliente/'.id_cliente) ?>">Tareas</a></li>
		<?php $activo=""; if($tab == 'contacto'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('clientes/contacto/'.id_cliente) ?>">Contactos</a></li>
		<?php $activo=""; if($tab == 'bitacora'){$activo="active";} ?>
		<li class="<?= $activo ?>"><a href="<?= site_url('bitacora/cliente/'.id_cliente) ?>">Bitacora</a></li>
	</ul>
</ul> 