<?php
	$id_corrente = $interview['Interview']['id'];
	$entrevistas = $this->requestAction(array('controller' => 'Interviews', 'action' => 'ultimas', $id_corrente));
?>

<div class="col-md-3 printColI">
	<p class="MateriasOutrasTituloCol fonteSiteSouvMedium textColorC">Recentes</p>
	<hr />
	
	
	<?php foreach($entrevistas as $key => $entrevista): ?>
		
		<?php

		$link = array('controller' => 'interviews', 'action' => 'view', 'slug' => $this->Link->makeLink($entrevista['Interview']['slug'], $entrevista['Interview']['id'])); 
		
		?>
		
		<p class="MateriasOutras">
			<a href="<?php echo $this->Html->url($link); ?>" class="LinkListaMaterias">
				<?php echo $entrevista['Interview']['name']; ?>
			</a>
			<br />
			<?php echo $entrevista['Interview']['subtitulo']; ?>
		</p> 
	
	<?php endforeach; ?>


	<p class="text-right"><a href="<?php echo $this->Html->url('/entrevistas'); ?>" class="LinkOutrasMateriasVerTodas">ver todas</a></p>

</div>