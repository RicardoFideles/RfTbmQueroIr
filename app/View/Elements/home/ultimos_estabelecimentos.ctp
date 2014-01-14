<?php
	$ultimos = $this->requestAction(array('controller' => 'establishments', 'action' => 'destaqueCapa'));
?>

<!-- CATEGORIAS -->
<div class="row marginTopB marginBottomB">
	
	<?php foreach($ultimos as $key => $establishment): ?>
		
		<?php
			$idCategoria = $establishment['Category']['id'] ;
			$categoria = $this->requestAction(array('controller' => 'categories', 'action' => 'categoria', $idCategoria));
		?>
		<div class="col-md-4 col-sm-4 col-xs-12 HomeAltMinC">
			<div class="BoxesCategoriasIcon">
				<?php 
					if (sizeof($categoria['Photo']) > 0) {
						$fotoPrincipal = $categoria['Photo'][0];
						
						$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
						
				?>
					<img src="<?php echo $this->Html->url($url) ?>" class="CategoriaPosIcon CategoriasIconXS" />
				<?php
					}
				?>
			</div>
			<div class="BoxesCategoriasFaixaTopoTexto">
				<?php
					echo $categoria['Category']['name'];
				?>
			</div>
			<div class="BoxesCategoriasFaixaTopo"></div>
			
			<?php 
	
					$link = array('controller' => 'establishments', 'action' => 'view', 'slug' => $this->Link->makeLink($establishment['Establishment']['slug'], $establishment['Establishment']['id'])); 
					
					if (sizeof($establishment['Photo']) > 0) {
						$fotoPrincipal = $establishment['Photo'][0];
					
						$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
				?>     
					<div class="HomeMatImageCrop">
						<a href="<?php echo $this->Html->url($link); ?>">
							<img src="<?php echo $this->Html->url($url) ?>"  class="img-responsive fotoSize marginBottomIMG">
						</a>
					</div>               
				<?php
					}
				?>
			
			
			
			<p class="fonteSiteSouvLight">
				<a href="<?php echo $this->Html->url($link); ?>" class="LinkCategoriasLugares fonteSiteSouvLight">
					<?php echo $establishment['Establishment']['name'] ?>
				</a>
			</p>
			<?php echo $establishment['Establishment']['breve'] ?>
		</div>
	<?php endforeach; ?>

</div>
  <!-- CATEGORIAS -->
