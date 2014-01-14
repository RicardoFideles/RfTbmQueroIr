<?php

	$destaques = $this->requestAction(array('controller' => 'destaques', 'action' => 'capa'));
	
?>

<!-- MATERIAS -->
	<div class="row marginTopB marginBottomB">
		
			<div class="col-md-4 col-sm-4 col-xs-12 HomeAltMinB">
				<?php 
	
					$link = array('controller' => 'news', 'action' => 'view', 'slug' => $this->Link->makeLink($destaques['News']['slug'], $destaques['News']['id'])); 
					
					if (sizeof($destaques['News']['Photo']) > 0) {
						$fotoPrincipal = $destaques['News']['Photo'][0];
					
						$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
				?>  
					<div class="HomeMatImageCrop">
						<a href="<?php echo $this->Html->url($link); ?>">
							<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive fotoSize marginBottomIMG">
						</a>
					</div>                  
				<?php
					}
				?>
				<p  class="HomeBoxesSubTit">
					<a href="<?php echo $this->Html->url($link); ?>" class="LinkMaterias2 fonteSiteSouvLight">
						<?php echo $destaques['News']['name']; ?>
					</a>
				</p>
				<?php
					echo $destaques['News']['subtitulo'];
				?>
			</div>
			
		
			<div class="col-md-4 col-sm-4 col-xs-12 HomeAltMinB">
				<?php 
	
					$link = array('controller' => 'people', 'action' => 'view', 'slug' => $this->Link->makeLink($destaques['Person']['slug'], $destaques['Person']['id'])); 
					
					if (sizeof($destaques['Person']['Photo']) > 0) {
						$fotoPrincipal = $destaques['Person']['Photo'][0];
					
						$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
				?>   
					<div class="HomeMatImageCrop">
						<a href="<?php echo $this->Html->url($link); ?>">
							<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive fotoSize marginBottomIMG">
						</a>
					</div>                 
				<?php
					}
				?>
				<p  class="HomeBoxesSubTit">
					<a href="<?php echo $this->Html->url($link); ?>" class="LinkMaterias2 fonteSiteSouvLight">
						<?php echo $destaques['Person']['name']; ?>
					</a>
				</p>
				<?php
					echo $destaques['Person']['subtitulo'];
				?>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12 HomeAltMinB">
				<?php 
	
					$link = array('controller' => 'interviews', 'action' => 'view', 'slug' => $this->Link->makeLink($destaques['Interview']['slug'], $destaques['Interview']['id'])); 
					
					if (sizeof($destaques['Interview']['Photo']) > 0) {
						$fotoPrincipal = $destaques['Interview']['Photo'][0];
					
						$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
				?>  
					<div class="HomeMatImageCrop">
						<a href="<?php echo $this->Html->url($link); ?>">
							<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive fotoSize marginBottomIMG">
						</a>
					</div>                 
				<?php
					}
				?>
				<p  class="HomeBoxesSubTit">
					<a href="<?php echo $this->Html->url($link); ?>" class="LinkMaterias2 fonteSiteSouvLight">
						<?php echo $destaques['Interview']['name']; ?>
					</a>
				</p>
				<?php
					echo $destaques['Interview']['subtitulo'];
				?>
			</div>
			
	</div>
<!-- MATERIAS -->