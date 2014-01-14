<!-- BLOGS LINKS -->
<div class="row marginTopB marginBottomB">

	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">BLOGS</p>
		<hr class="hrTitulos" />
	</div>

	<?php foreach($blogs as $key => $blog): ?>
		
		<div class="col-md-4 col-sm-4 col-xs-12 InternaAlturaBlog">                    
			<p class="fonteSiteSouvLight"><?php echo $blog['Blog']['name']; ?></p>
			
			<?php $link = $blog['Blog']['link']; ?>
			
			<a href="<?php echo $this->Html->url($link); ?>" class="LinkInternas">
				<?php echo $link; ?>
			</a>
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