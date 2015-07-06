<div class="row">
	<div class="col-xs-12">
		<div class="block-section">
			<h4 class="sub-header"><?= $titulo ?></h4>
			<ul class="nav nav-tabs">
				<?php $activo=""; if($tab == 'detalles'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('clientes/ver/'.$id_cliente) ?>">Detalles</a></li>
				<?php $activo=""; if($tab == 'proyec_tarea'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('proyectos/proyectos_tareas/'.$id_cliente) ?>">Proyectos y Tareas</a></li>
				<?php $activo=""; if($tab == 'contacto'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="<?= site_url('clientes/contacto/'.$id_cliente) ?>">Contacto</a></li>
				<?php $activo=""; if($tab == 'bitacora'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="javascript:void(0)">Bitacora</a></li>
				<?php $activo=""; if($tab == 'Permisos'){$activo="active";} ?>
				<li class="<?= $activo ?>"><a href="javascript:void(0)">Permisos</a></li>
			</ul>
		</div>
	</div>
</div>