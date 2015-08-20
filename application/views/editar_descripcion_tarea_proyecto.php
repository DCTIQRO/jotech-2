<div class="block">
	<div class="block-title">
		<h2>Editar Descripción de la <?= $titulo ?><h2>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php 
			$attributes = array('class' => 'form-bordered form-horizontal', 'id' => '');
			echo	form_open(site_url('tareas_proyectos/editar_descripcion/'.$id), $attributes); 
			?>
				<div class="form-group">
					<label class="label-control col-xs-12">Descripción</label>
					<?php echo form_textarea( array( 'name' => 'descripcion', 'rows' => '5','class' => 'form-control', 'cols' => '80', 'value' => set_value('descripcion',$descripcion) ) )?>
				</div>
				<div class="col-xs-12 text-center">
					 <input type="submit" class="btn btn-sm btn-success" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</div>