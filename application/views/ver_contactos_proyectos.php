<div class="block">
	<div class="block-title">
		<h2>Contactos del <?= $titulo ?><h2>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center">
			<div class="table-responsive">
				<table id="tabla_contactos" class="table table-vcenter table-condensed table-bordered">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Teléfono</th>
							<th class="text-center">Correo</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($contactos as $contacto){
						?>
						<tr>
							<td class="text-center"><?= $contacto->nombre ?></td>
							<td class="text-center"><?= $contacto->telefono ?></td>
							<td class="text-center"><?= $contacto->correo ?></td>
						</tr>
						<?php	
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>