<div class="block full">
	<div class="block-title">
		<h2>Editar Clasificación<strong>Clientes</strong></h2>
	</div>
	<div class="row" Style="margin-bottom:10px">
		<div class="col-xs-12">
			<form class="form-bordered form-horizontal" action="<?= site_url('clasificaciones_clientes/editar_clasificacion') ?>" method="post" >
				<div class="form-group">
					<label class="label-control col-sm-2">Nombre</label>
					<div class="col-sm-10">
						<input class="form-control" name="nombre" type="text" value="<?= $datos->nombre ?>" placeholder="Nombre Clasificación">
					</div>
				</div>
				<div class="form-group">
					<label class="label-control col-sm-2">Descripción</label>
					<div class="col-sm-10">
						<input class="form-control" name="descripcion" type="text" value="<?= $datos->descripcion ?>" placeholder="Descripción Clasificación">
					</div>
				</div>
				<input type="hidden" id="id_clasificacion" name="id_clasificacion" value="<?= $datos->id ?>" />
				<div class="col-sm-12 text-center">
					<input type="submit" class="btn-sm btn-success" value="Actualizar" />
				</div>
			</form>
		</div>
	</div>
</div>