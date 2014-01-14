<?php
	$establishments = $this->requestAction(array('controller' => 'establishments', 'action' => 'ultimas'));
	
?>

<div class="col-md-3 col-sm-3 col-xs-12 marginBottomA printColC">

	<p class="MateriasOutrasTituloCol fonteSiteSouvMedium textColorC">Recentes</p>
	<hr />
	
	
	<?php foreach($establishments as $key => $establishment): ?>
		
		<?php

			$link = array('controller' => 'establishments', 'action' => 'view', 'slug' => $this->Link->makeLink($establishment['Establishment']['slug'], $establishment['Establishment']['id'])); 
		
		?>
		
		<p class="MateriasOutras">
			<div class="row">
				<div class="col-md-2">
					<?php 
						if (sizeof($category['Photo']) > 0) {
							$fotoPrincipal = $category['Photo'][0];
							
							$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
					?>
						<div class="col-md-1 printColDEstabelecIcon">
							<img src="<?php echo $this->Html->url($url) ?>" class="CategoriasIconXXS" />
						</div>
					<?php
						}
					?>
				</div>
				<div class="col-md-10">
					<a href="<?php echo $this->Html->url($link); ?>" class="LinkEstabelecimentoOutros fonteSiteSouvMedium">
						<?php echo $establishment['Establishment']['name']; ?>
					</a>
				</div>
			</div>
			<div id="EstabelecimentoOutrosTexto">
				<?php echo $establishment['Establishment']['informacoes']; ?>
			</div>
		</p> 
              
	<?php endforeach; ?>

	<?php
		if (sizeof($establishments) > 0) {
			
			$categoria = $establishments[0];
		
			$slug = $categoria['Category']['slug'];
			
			$link_2 = array('controller' => 'establishments', 'action' => 'lista', 'slug' => $slug);
	?>
		<p class="text-right"><a href="<?php echo $this->Html->url($link_2); ?>" class="LinkOutrasMateriasVerTodas">ver todas</a></p>
	<?php
		}
	?>

</div>