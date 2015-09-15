<div class="block">
	<div class="block-title">
		<h2>Editar Clasificaciones del <?= $titulo ?><h2>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php 
			$attributes = array('class' => 'form-bordered form-horizontal', 'id' => '');
			echo	form_open(site_url('proyectos/guardar_edicion_clasificaciones/'.$id), $attributes); 
			$i=1;
			foreach($clasificaciones_asignadas as $asignaciones){
			?>
				<div class="form-group" id="grupo<?= $i ?>">
					<label class="label-control col-sm-2">Clasificación</label>
					<div class="col-sm-4">
						<select name="clasificacion<?= $i ?>" id="clasificacion<?= $i ?>" class="form-control select-chosen">
							<option></option>
						<?php
							$options="";
							foreach($clasificaciones as $clasificacion)
							{
								$select="";
								if($clasificacion->id == $asignaciones->id){$select="selected";}
								$options.='<option value="'.$clasificacion->id.'">'.$clasificacion->nombre.'</option>';
								echo '<option value="'.$clasificacion->id.'" '.$select.'>'.$clasificacion->nombre.'</option>';
							}
						?>
						</select>
					</div>
					<label class="label-control col-sm-2">Prioridad</label>
					<div class="col-sm-2">
						<select name="prioridad<?= $i ?>" id="prioridad<?= $i ?>" class="form-control select-chosen">
							<option></option>
							<?php  $selec=""; if($asignaciones->prioridad == 1){$selec="selected";} ?>
							<option value="1" <?= $selec ?>>Baja</option>
							<?php  $selec=""; if($asignaciones->prioridad == 2){$selec="selected";} ?>
							<option value="2" <?= $selec ?>>Mediana</option>
							<?php  $selec=""; if($asignaciones->prioridad == 3){$selec="selected";} ?>
							<option value="3" <?= $selec ?>>Alta</option>
						</select>
					</div>
					<div class="col-sm-2"  Style="padding-top:10px">
						<label onClick="quitarClasif (<?= $i ?>)" class="btn-sm btn-danger">Eliminar</label>
					</div>
					<label class="label-control col-sm-2">Obervaciones</label>
					<div class="col-sm-8">
						<textarea id="observaciones<?= $i ?>" name="observaciones<?= $i ?>" rows="1" class="form-control"><?= $asignaciones->observaciones ?></textarea>
					</div>
				</div>
			<?php $i++; } ?>
				<div id="new_clasif" name="new_clasif">
					<!--Aqui se pondran las nuevas clasificaciones-->
				</div>
				<input type="hidden" name="numero_clas" id="numero_clas" value="<?= $i ?>" />
				<div class="form-group text-center">
					<a href="javascript:void(0)" class="btn-sm btn-info" onClick="agregarClasif()">Nueva Clasificación</a>
				</div>
				<div class="col-xs-12 text-center">
					 <input type="submit" class="btn btn-sm btn-success" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
var i=$('#numero_clas').val();
function agregarClasif ()
{
	x=	'<div class="form-group" id="grupo'+i+'">'+
			'<label class="col-sm-2 label-control"  for="clasificacion'+i+'">Clasificación '+i+'</label>'+
			'<div class="col-sm-4">'+
				'<div class="input-group">'+
					'<select id="clasificacion'+i+'" name="clasificacion'+i+'" class="select-chosen form-control clasifi">'+
						'<option></option>'+
						'<?= $options ?>'+
					'</select>'+
				'</div>'+
			'</div>'+
			'<label class="col-sm-2 label-control"  for="prioridad'+i+'">Prioridad '+i+'</label>'+
			'<div class="col-sm-2">'+
				'<div class="input-group">'+
					'<select id="prioridad'+i+'" name="prioridad'+i+'" class="select-chosen form-control prioridades">'+
						'<option value="">Seleccione una Prioridad</option>'+
						'<option value="1">Baja</option>'+
						'<option value="2">Mediana</option>'+
						'<option value="3">Alta</option>'+
					'</select>'+
				'</div>'+
			'</div>'+
			'<div class="col-sm-2"  Style="padding-top:10px">'+
				'<label onClick="quitarClasif ('+i+')" class="btn-sm btn-danger">Eliminar</label>'+
			'</div>'+
			'<label class="label-control col-sm-2">Obervaciones'+i+'</label>'+
			'<div class="col-sm-8">'+
				'<textarea id="observaciones'+i+'" name="observaciones'+i+'" rows="1" class="form-control"></textarea>'+
			'</div>'+
		'</div>';
	$("#new_clasif").append( x );
	$('.select-chosen').chosen();
	$('#div_nueva_clasificacion'+i).hide();
	$('#numero_clas').val(i);
	i++;
}

function quitarClasif (num)
{
		$('#grupo'+num).remove();
}
</script>