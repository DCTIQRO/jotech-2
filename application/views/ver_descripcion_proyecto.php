<div class="block">
	<div class="block-title">
		<h2>Descripción del <?= $titulo ?><h2>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<?= $descripcion ?>
		</div>
	</div>
</div>

<div class="block">
	<div class="block-title">
		<h2>Clasificaciones del <?= $titulo ?><h2>
	</div>
	<div class="row">
		<div class="col-xs-12" Style="padding-bottom:10px">
			<?php 
				foreach($clasificaciones as $clasificacion){
					$prioridad="";
					if($clasificacion->prioridad == "3")$prioridad="Alta";
					if($clasificacion->prioridad == "2")$prioridad="Mediana";
					if($clasificacion->prioridad == "1")$prioridad="Baja";
			?>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="list-group-item">
							<span class="badge">Prioridad  <?= $prioridad ?></span>
							<h4 class="list-group-item-heading"></h4><br>
							<p class="list-group-item-text"><strong><h4><?= $clasificacion->nombre ?><h4></strong></p>
						</div>
					</div>
			<?php
				}
			?>
		</div>
	</div>
</div>