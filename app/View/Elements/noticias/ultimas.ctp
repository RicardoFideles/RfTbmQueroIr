<?php

	if (!isset($news)) {
		$news = null;
	} 
	
	if ($news != null && $news['News'] != null && $news['News']['id'] != null) {
		$id_corrente = $news['News']['id'];
	} else {
		$id_corrente = null;
	}
	
	$noticias = $this->requestAction(array('controller' => 'News', 'action' => 'ultimas', $id_corrente));
?>

<div class="col-md-3 printColI">
	<p class="MateriasOutrasTituloCol fonteSiteSouvMedium textColorC">Recentes</p>
	<hr />
	
	
	<?php foreach($noticias as $key => $noticia): ?>
		
		<?php

		$link = array('controller' => 'news', 'action' => 'view', 'slug' => $this->Link->makeLink($noticia['News']['slug'], $noticia['News']['id'])); 
		
		?>
		
		<p class="MateriasOutras">
			<a href="<?php echo $this->Html->url($link); ?>" class="LinkListaMaterias">
				<?php echo $noticia['News']['name']; ?>
			</a>
			<br />
			<?php echo $noticia['News']['subtitulo']; ?>
		</p> 
	
	<?php endforeach; ?>


	<p class="text-right"><a href="<?php echo $this->Html->url('/materias'); ?>" class="LinkOutrasMateriasVerTodas">ver todas</a></p>

</div>