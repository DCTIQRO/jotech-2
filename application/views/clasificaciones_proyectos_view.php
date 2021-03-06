<div class="content-header">
	<div class="header-section">
		<div class="widget">
			<div class="widget-simple">
			<a href="javascript:void(0)" class="widget-icon pull-left themed-background-fire animation-fadeIn">
			<i class="fa fa-cubes sidebar-nav-icon"></i>
			</a>
			<h1 class="widget-content text-letf animation-pullDown">
			<strong>Clasificación</strong>
			</h1>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>Proyectos</li>
	<li><a href="">Clasificación</a></li>
</ul>

<div class="block full">
	<div class="block-title">
		<h2>Clasificación <strong>Proyectos</strong></h2>
	</div>
	<div class="row" Style="margin-bottom:10px">
		<div class="col-xs-12">
			<form class="form-bordered form-horizontal" action="<?= site_url('clasificaciones_proyectos/guardar_clasificacion') ?>" method="post" >
				<label class="label-control col-sm-2">Nombre</label>
				<div class="col-sm-3">
					<input class="form-control" name="nombre" type="text" placeholder="Nombre Clasificación">
				</div>
				<label class="label-control col-sm-2">Descripción</label>
				<div class="col-sm-3">
					<input class="form-control" name="descripcion" type="text" placeholder="Descripción Clasificación">
				</div>
				<div class="col-sm-2">
					<input type="submit" class="btn-sm btn-success" value="Agregar" />
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="table-responsive">
			<table id="tabla_clientes" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Cliente</th>
						<th class="text-center">Descripción</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($clasificaciones as $clasificacion)
					{
					?>
					<tr>
						<td class="text-center"><?= $clasificacion->id_clasificacion ?></td>
						<td class="text-center"><a href="javascript:void(0)"><?= $clasificacion->nombre ?></a></td>
						<td class="text-center"><?= $clasificacion->descripcion ?></td>
						<td class="text-center">
							<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
							<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="<?= asset_url('js/pages/tablaclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
