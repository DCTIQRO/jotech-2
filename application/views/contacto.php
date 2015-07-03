<div class="row">
<div class="col-xs-12" >
<div class="block">
	<?php $this->load->view('basic/tabs_cliente') ?>
	<div class="row">
		<div class="table-responsive">
			<table id="tabla_contacto" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Puesto</th>
						<th class="text-center">Teléfono</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Newsletter</th>
						<th class="text-center">Postal</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($contactos as $contacto)
					{
					?>
					<tr>
						<td class="text-center"><?= $contacto->id ?></td>
						<td class="text-center"><a href="javascript:void(0)"><?= $contacto->nombre ?></a></td>
						<td class="text-center"><?= $contacto->puesto ?></td>
						<td class="text-center"><?= $contacto->telefono ?></td>
						<td class="text-center"><?= $contacto->correo ?></td>
						<td class="text-center"><?php if($contacto->newsletter){echo '<i class="fa fa-check fa-2x text-success"></i>';} ?></td>
						<td class="text-center"><?php if($contacto->postal){echo '<i class="fa fa-check fa-2x text-success"></i>';} ?></td>
						<td class="text-center">
							<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Ver Contacto" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
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
</div>
</div>

<script src="<?= asset_url('js/pages/contactoclientes.js') ?>"></script>
<script>$(function(){ TablesDatatables.init(); });</script>