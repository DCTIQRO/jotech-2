<div class="block full">
	<div class="block-title">
		<h2>Permisos <strong>Pantallas</strong></h2>
	</div>
	<div class="table-responsive">
		<table id="tabla_clientes" class="table table-vcenter table-condensed table-bordered">
			<thead>
				<tr>
					<th class="text-center">Usuarios</th>
					<th class="text-center">Contactos</th>
					<th class="text-center">Clientes</th>
					<th class="text-center">Proyectos</th>
					<th class="text-center">Tareas</th>
					<th class="text-center">Usuarios</th>
					<th class="text-center">Clasificaciones</th>
					<th class="text-center">Permisos Pantalla</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($usuarios as $usuario)
				{
				?>
				<tr>
					<td class="text-center"><?= $usuario->first_name." ".$usuario->last_name ?></td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Contactos == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.'  id="Contactos'.$pantalla->user_id.'" onChange="cambiar_status(\'Contactos\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Clientes == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.' id="Clientes'.$pantalla->user_id.'" onChange="cambiar_status(\'Clientes\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Proyectos == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.' id="Proyectos'.$pantalla->user_id.'" onChange="cambiar_status(\'Proyectos\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Tareas == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.' id="Tareas'.$pantalla->user_id.'" onChange="cambiar_status(\'Tareas\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Usuarios == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.' id="Usuarios'.$pantalla->user_id.'" onChange="cambiar_status(\'Usuarios\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Clasificaciones == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.' id="Clasificaciones'.$pantalla->user_id.'" onChange="cambiar_status(\'Clasificaciones\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
					<td class="text-center">
					<?php
						foreach($pantallas as $pantalla)
						{
							if($pantalla->user_id == $usuario->id)
							{
								$check="";if($pantalla->Pantallas == 1)$check="checked";
								
								echo '<label class="switch switch-primary"><input type="checkbox" value="1" '.$check.' id="Pantallas'.$pantalla->user_id.'" onChange="cambiar_status(\'Pantallas\','.$pantalla->user_id.')" ><span></span></label>';
							}
						}
					?>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script>
function cambiar_status(pantalla,id)
{
	var check=0;
	if($('#'+pantalla+id).is(':checked')) check=1;
	
	$.post("<?= site_url('pantallas/cambiar_status') ?>", {
		pantalla: pantalla, 
		id_usuario:id,
		seleccion:check
	}, function(result){
	   console.log(result);
	});
}
</script>