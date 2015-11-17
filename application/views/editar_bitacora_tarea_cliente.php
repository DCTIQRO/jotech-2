<div class="block full">
	<div class="block-title">
		<h2>Editar<strong>Bitacora</strong></h2>
	</div>
	<div class="row" Style="margin-bottom:10px">
		<div class="col-xs-12">
			<form class="form-bordered form-horizontal" action="<?= site_url('tareas/guardar_edicion_bitacora_tareas') ?>" method="post" >
				<div class="form-group">
					<label class="label-control col-sm-12">Comentario</label>
					<div class="col-sm-12">
						<textarea class="form-control ckeditor" name="comentario" rows="10"  placeholder="Agrega un comentario"><?= $datos->comentario ?></textarea>
					</div>
				</div>
				<input type="hidden" id="id_bitacora" name="id_bitacora" value="<?= $datos->id ?>" />
				<div class="col-sm-12 text-center">
					<input type="submit" class="btn-sm btn-success" value="Actualizar" />
				</div>
			</form>
		</div>
	</div>
</div>

<script src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'comentario', {
    customConfig: '<?= asset_url('js/helpers/config ckeditor/config.js') ?>'
} );
</script>