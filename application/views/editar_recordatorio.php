<div class="block full">
	<div class="block-title">
		<h2>Editar<strong>Recordatorio</strong></h2>
	</div>
	<div class="row" Style="margin-bottom:10px">
		<div class="col-xs-12">
			<form class="form-bordered form-horizontal" action="<?= site_url('recordatorios/guardar_edicion') ?>" method="post" >
				<div class="form-group">
					<label class="label-control col-xs-12">Descripción</label>
					<div class="col-xs-12">
						<textarea class="form-control" name="descripcion" rows="4"  placeholder="Agrega un comentario"><?= $recordatorio->descripcion ?></textarea>
					</div>
				</div>
				<?php
					list($año,$mes,$dia)=explode("-",$recordatorio->Fecha);
					$fecha=$dia."-".$mes."-".$año;
				?>
				<div class="form-group">
					<label class="label-control col-xs-12">Fecha Actividad</label>
					<div class="col-xs-12">
						<input type="text" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" id="fecha" name="fecha" value="<?= $fecha ?>" required placeholder="dd-mm-yyyy"  />
					</div>
				</div>
				<input type="hidden" id="id_recordatorio" name="id_recordatorio" value="<?= $recordatorio->idRecordatorios ?>" />
				<div class="col-sm-12 text-center">
					<input type="submit" class="btn-sm btn-success" value="Actualizar" />
				</div>
			</form>
		</div>
	</div>
</div>