<?php   
	$this->set(array(
        'body_class' => 'bkgBody',
    ));

	$pagina = $this->requestAction(array('controller' => 'Paginas', 'action' => 'sobre'));
	
	
	$pagina = $pagina[0];
	
?>
<!-- MATERIA ABERTA -->
<div class="row marginTopB marginBottomB">
	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">SOBRE</p>
		<hr class="hrTitulos" />
	</div>
	
	<div class="col-md-9 printColH">
		<?php 
			foreach($pagina as $key => $pagina):
				echo $this->RenderBody->consertaLinks($pagina['texto']);
			endforeach; 
		?>
	</div>
	<?php echo $this->element('noticias/ultimas'); ?>
	
</div>
	

<?php echo $this->element('estabelecimentos/outros'); ?>
