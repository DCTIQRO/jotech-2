<div class="block">
	<div class="block-title">
		<h2>Usuarios del <?= $titulo ?><h2>
	</div>
	<div class="row">
		<div class="col-xs-12" Style="padding-bottom:10px">
			<?php 
				foreach($usuarios as $usuario){
			?>
				<div class="col-xs-12 col-sm-4 col-md-3" Style="margin-bottom:10px">
					<div class="list-group-item">
						<h4 class="list-group-item-heading"><?= $usuario->email ?></h4><br>
						<p class="list-group-item-text"><strong><h4><?= $usuario->first_name." ".$usuario->last_name ?><h4></strong></p>
					</div>
				</div>
			<?php
				}
			?>
		</div>
	</div>
</div>