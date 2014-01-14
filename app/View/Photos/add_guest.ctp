<?php 
	if (!empty($photo_user)) {
		
		$photo_user = $photo_user['Photo'];
		$url = $this->Link->makeLinkImgDir('original', $photo_user['imagem'], 'fotos');
?>
	<img src="<?php echo $this->Html->url($url) ?>" class="FotoUserSM" />
<?php
	}
?>