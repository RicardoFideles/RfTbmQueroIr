<!-- MATERIAS LINKS -->

<?php   $this->set(array(
	    'title_for_layout' => 'Matérias'
	));
?>

<div class="row marginTopB marginBottomB">

	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">MATÉRIAS</p>
		<hr class="hrTitulos" />
	</div>

	<?php foreach($news as $key => $news): ?>
		
		<?php
			$link = array('controller' => 'news', 'action' => 'view', 'slug' => $this->Link->makeLink($news['News']['slug'], $news['News']['id'])); 
		?>
		<div class="col-md-12 col-sm-4 col-xs-12 MateriasTituloListagem">                    
			<p>
				<a href="<?php echo $this->Html->url($link); ?>" class="LinkListaEntrevistas">
					<?php echo $news['News']['name']; ?>
				</a>
			</p>
			<p class="EntrevistasData">
				<?php echo $this->Time->format('d.m.Y', $news['News']['created'], null, 'America/Sao_Paulo'); ?>
			</p>                        
			<p class="EntrevistasSubtituloPQ">
				<?php echo $news['News']['subtitulo']; ?>
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
  
<?php echo $this->element('estabelecimentos/outros'); ?>
