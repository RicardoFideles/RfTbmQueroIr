<?php
	$id_corrente = $person['Person']['id'];
	$historias = $this->requestAction(array('controller' => 'People', 'action' => 'ultimas', $id_corrente));
?>

<div class="col-md-3 printColI">
	<p class="MateriasOutrasTituloCol fonteSiteSouvMedium textColorC">Recentes</p>
	<hr />
	
	
	<?php foreach($historias as $key => $historia): ?>
		
		<?php

		$link = array('controller' => 'people', 'action' => 'view', 'slug' => $this->Link->makeLink($historia['Person']['slug'], $historia['Person']['id'])); 
		
		?>
		
		<p class="MateriasOutras">
			<a href="<?php echo $this->Html->url($link); ?>" class="LinkListaMaterias">
				<?php echo $historia['Person']['name']; ?>
			</a>
			<br />
			<?php echo $historia['Person']['subtitulo']; ?>
		</p> 
	
	<?php endforeach; ?>


	<p class="text-right"><a href="<?php echo $this->Html->url('/historias'); ?>" class="LinkOutrasMateriasVerTodas">ver todas</a></p>

</div>