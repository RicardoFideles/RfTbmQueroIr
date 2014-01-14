<!-- MATERIAS LINKS -->

<?php   $this->set(array(
	    'title_for_layout' => 'Minha História'
	));
?>
<div class="row marginTopB marginBottomB">

	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">MINHA HISTÓRIA</p>
		<hr class="hrTitulos" />
	</div>

	<?php foreach($historias as $key => $historia): ?>
		
		<?php
			$link = array('controller' => 'people', 'action' => 'view', 'slug' => $this->Link->makeLink($historia['Person']['slug'], $historia['Person']['id'])); 
		?>
		<div class="col-md-12 col-sm-4 col-xs-12 MateriasTituloListagem">                    
			<p>
				<a href="<?php echo $this->Html->url($link); ?>" class="LinkListaEntrevistas">
					<?php echo $historia['Person']['name']; ?>
				</a>
			</p>
			<p class="EntrevistasData">
				<?php echo $this->Time->format('d.m.Y', $historia['Person']['created'], null, 'America/Sao_Paulo'); ?>
			</p>                        
			<p class="EntrevistasSubtituloPQ">
				<?php echo $historia['Person']['subtitulo']; ?>
			</p>                        
		</div>
	<?php endforeach; ?>

</div>

  <!-- BLOGS LINKS -->

  <!-- BLOGS PAGINACAO -->
<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-6">
		<p class="InternasPaginacao">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}')
				));
			?>
		</p>
	</div>
  
	<div class="col-md-4 col-sm-4 col-xs-6 text-center">
		<ul class="pagination">
    <?php
        echo $this->Paginator->prev(' anterior ', array('tag' => 'span' , 'class'=> 'previous'), null, array('class' => 'disable', 'tag' => 'span'));
		echo " | ";
        echo $this->Paginator->next(' próximo ', array('tag' => 'span', 'class'=> 'next'), null, array('class' => 'disable','tag' => 'span'));
    ?>
</ul>
	</div>
</div>
  <!-- BLOGS PAGINACAO -->
  
<?php 
	echo $this->element('estabelecimentos/outros', 
						array(), 
						array("cache" => array('config' => 'short', 'key' => 'outros_historia')
		)); 
?>
