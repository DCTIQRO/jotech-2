<div class="block full">
	<div class="block-title">
		<h2>Editar<strong>Bitacora</strong></h2>
	</div>
	<div class="row" Style="margin-bottom:10px">
		<div class="col-xs-12">
			<form class="form-bordered form-horizontal" action="<?= site_url('bitacora/guardar_edicion') ?>" method="post" >
				<div class="form-group">
					<label class="label-control col-sm-12">Comentario</label>
					<div class="col-sm-12">
						<textarea class="form-control" name="comentario" rows="10"  placeholder="Agrega un comentario"><?= $datos->comentario ?></textarea>
					</div>
				</div>
				<input type="hidden" id="id_bitacora" name="id_bitacora" value="<?= $datos->idclientes_comentarios ?>" />
				<div class="col-sm-12 text-center">
					<input type="submit" class="btn-sm btn-success" value="Actualizar" />
				</div>
			</form>
		</div>
	</div>
</div>