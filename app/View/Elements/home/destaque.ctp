<?php
	$destaque_id = $this->requestAction(array('controller' => 'destaques', 'action' => 'capa'));
	
	$destaque_id = $destaque_id['Destaque']['posicao_1'];
	
	$destaque = $this->requestAction(array('controller' => 'news', 'action' => 'carrega', $destaque_id));
	
	
?>


<?php 
	if ($destaque!= null && sizeof($destaque) > 0) {
?>

<!-- MATERIA -->
<div class="col-md-6 col-sm-8 col-xs-12 HomeAltMinA">
	<?php 
	
		$link = array('controller' => 'news', 'action' => 'view', 'slug' => $this->Link->makeLink($destaque['News']['slug'], $destaque['News']['id'])); 
		
		if (sizeof($destaque['Photo']) > 0) {
			$fotoPrincipal = $destaque['Photo'][0];
		
			$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
	?>
		<a href="<?php echo $this->Html->url($link); ?>">
			<div class="HomeDestaqueMatImageCrop">
				<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive fotoSize marginBottomIMG">
			</div>
		</a>
		
	<?php
		}
	?>
	<p>
		<a href="<?php echo $this->Html->url($link); ?>" class="LinkMaterias1 fonteSiteSouvLight">
			<?php echo $destaque['News']['name'] ?>
		</a>
	</p>
	<p>
		<?php 
			echo $destaque['News']['subtitulo'];
		?>
	</p> 
</div>

<?php
	}
?>