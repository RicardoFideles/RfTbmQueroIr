<?php
	$categorias = $this->requestAction(array('controller' => 'Categories', 'action' => 'menu'));
	
	$texto_sobre_rodape = $this->requestAction(array('controller' => 'Paginas', 'action' => 'texto_sobre_rodape'));
	
	
	$texto_sobre_rodape = $texto_sobre_rodape[0];
	
?>

<!-- RODAPE -->
<!-- lg md sm  -->
<div class="row bkgRodape hidden-xs hidden-print">                    
	<div class="col-md-3 col-sm-6 col-xs-12 marginTopB marginBottomA">
		<p class="fonteSiteSouvMedium RodapeTitulo">SOBRE</p>
		<p class="RodapeTexto">
			<?php 
				echo $this->RenderBody->consertaLinks($texto_sobre_rodape['Pagina']['texto']);
			?>
		</p>
	</div>
  
	<div class="col-md-2 col-sm-3 col-xs-6 marginTopB marginBottomA RodapeAltMin">
		<p class="fonteSiteSouvMedium RodapeTitulo">TAMBÉM QUERO IR</p>
		<p class="RodapeTexto">
			<ul class="RodapeTextoListUL">
				<li class="RodapeTextoListLI">
					<a href="<?php echo $this->Html->url('/sobre') ?>" class="LinkRodape">SOBRE NÓS</a>
				</li>
				<li class="RodapeTextoListLI">
					<a href="<?php echo $this->Html->url('/materias') ?>" class="LinkRodape">MATÉRIAS</a>
					</li>
				<li class="RodapeTextoListLI">
					<a href="<?php echo $this->Html->url('/entrevistas'); ?>" class="LinkRodape">ENTREVISTAS</a>
				</li>
				<li class="RodapeTextoListLI">
					<a href="<?php echo $this->Html->url('/blogs'); ?>" class="LinkRodape">BLOGS</a>
				</li>
				<li class="RodapeTextoListLI">
					<a href="<?php echo $this->Html->url('/contato') ?>" class="LinkRodape">CONTATO</a>
				</li>
				<li class="RodapeTextoListLI">
					<a href="<?php echo $this->Html->url('/politica-de-privacidade') ?>" class="LinkRodape">POLÍTICA DE PRIVACIDADE</a>
				</li>
				
			</ul>
		</p>
	</div>
  
	<div class="col-md-2 col-sm-3 col-xs-6 marginTopB marginBottomA RodapeAltMin">
		<p class="fonteSiteSouvMedium RodapeTitulo">CATEGORIAS</p>
		<p class="RodapeTexto">
			<ul class="RodapeTextoListUL">
				<?php foreach($categorias as $key => $categoria): ?>
					
					<?php
	          			$nome = $categoria['categories']['name'];
						$slug = $categoria['categories']['slug'];
						
						$link = array('controller' => 'categories', 'action' => 'view', 'slug' => $slug);
	          		?>
					
					<li class="RodapeTextoListLI">
						<a href="<?php echo $this->Html->url($link) ?>" class="LinkRodape">
							<?php echo strtoupper($nome); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</p>
	</div>

	<div class="col-md-5 col-sm-12 marginTopB marginBottomA">
		<div class="facebookResponsive">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FTamb%25C3%25A9m-Quero-Ir%2F532360213518427&amp;width=1000&amp;height=230&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:1000px; height:230px;" allowTransparency="true"></iframe>
		</div>
	</div>

	
</div>
<!-- lg md sm  -->

<!-- xs  -->
<div class="row bkgRodape visible-xs hidden-print">                    
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12 marginTopB marginBottomA">
  				<p class="fonteSiteSouvMedium RodapeTitulo">SOBRE</p>
  				<p class="RodapeTexto">
  					<?php 
						echo $this->RenderBody->consertaLinks($texto_sobre_rodape['Pagina']['texto']);
					?>
				</p>
			</div>
		</div>
  
		<div class="row">
			<div class="col-xs-6 RodapeAltMin">
				<p class="fonteSiteSouvMedium RodapeTitulo">TAMBÉM QUERO IR</p>
				<p class="RodapeTexto">
					<ul class="RodapeTextoListUL">
						<li class="RodapeTextoListLI">
							<a href="" class="LinkRodape">SOBRE NÓS</a>
						</li>
						<li class="RodapeTextoListLI">
							<a href="<?php echo $this->Html->url('/materias') ?>" class="LinkRodape">MATÉRIAS</a>
						</li>
						<li class="RodapeTextoListLI">
							<a href="<?php echo $this->Html->url('/entrevistas'); ?>" class="LinkRodape">ENTREVISTAS</a>
						</li>
						<li class="RodapeTextoListLI">
							<a href="<?php echo $this->Html->url('/blogs'); ?>" class="LinkRodape">BLOGS</a>
						</li>
						<li class="RodapeTextoListLI">
							<a href="<?php echo $this->Html->url('/contato') ?>" class="LinkRodape">CONTATO</a>
						</li>
						<li class="RodapeTextoListLI">
							<a href="<?php echo $this->Html->url('/politica-de-privacidade') ?>" class="LinkRodape">POLÍTICA DE PRIVACIDADE</a>
						</li>
					</ul>
				</p>
			</div>
			
			<div class="col-xs-6 RodapeAltMin">
				<p class="fonteSiteSouvMedium RodapeTitulo">CATEGORIAS</p>
				<p class="RodapeTexto">
					<ul class="RodapeTextoListUL">
						<?php foreach($categorias as $key => $categoria): ?>
							
							<?php
				      			$nome = $categoria['categories']['name'];
								$slug = $categoria['categories']['slug'];
								
								$link = array('controller' => 'categories', 'action' => 'view', 'slug' => $slug);
				      		?>
							
							
							<li class="RodapeTextoListLI">
								<a href="<?php echo $this->Html->url($link) ?>" class="LinkRodape">
									<?php echo strtoupper($nome); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</p>
			</div>
		</div>

		<div class="row">                        
			<div class="col-xs-12 marginBottomA">
				<div class="facebookResponsive">
                  <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FTamb%25C3%25A9m-Quero-Ir%2F532360213518427&amp;width=1000&amp;height=230&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:1000px; height:230px;" allowTransparency="true"></iframe>
                </div>    
			</div>
		</div>
	</div>
</div>
<!-- xs  -->
<!-- RODAPE -->