<?php
	$outros = $this->requestAction(array('controller' => 'establishments', 'action' => 'outros'));
?>

<!-- OUTROS ESTABELECIMENTOS -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 bkgRodapeOutrosEstab marginTopA marginBottomA OutrosEstabTitulo fonteSiteSouvMedium">
		Leia sobre a acessibilidade de diversos estabelecimentos.
	</div>
  	
  	<?php foreach($outros as $key => $establishment): ?>
  		
  		<?php
			$idCategoria = $establishment['Category']['id'] ;
			$categoria = $this->requestAction(array('controller' => 'categories', 'action' => 'categoria', $idCategoria));
		?>
		
	  	<div class="col-md-3 col-sm-3 marginBottomA">
	  		<div class="row">
	  			<div class="col-md-2 col-sm-2 col-xs-2">
	  				<?php 
						if (isset($categoria['Photo']) && sizeof($categoria['Photo']) > 0) {
							$fotoPrincipal = $categoria['Photo'][0];
							
							$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
					?>
		  				<img src="<?php echo $this->Html->url($url) ?>" class="CategoriasIconXXS" />
					<?php
						}
					?>
				</div>
	  				
				<div class="col-md-10 col-sm-10 col-xs-10">
					<a href="#" class="LinkRodapeOutrosEstab fonteSiteSouvMedium">
					<?php echo $establishment['Establishment']['name']; ?>
					</a>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 OutrosEstabTexto">
					<?php echo $establishment['Establishment']['breve']; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
  
</div>


  <!-- OUTROS ESTABELECIMENTOS -->