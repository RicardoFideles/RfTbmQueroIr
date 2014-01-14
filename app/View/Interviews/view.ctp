<?php echo $this->element('facebook/sdk'); ?>

<?php   $this->set(array(
	    'title_for_layout' => $interview['Interview']['name']
	));
?>

<!-- MATERIA ABERTA -->
<div class="row marginTopB marginBottomB">
	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">ENTREVISTAS</p>
		<hr class="hrTitulos" />
	</div>

	<div class="col-md-9 printColH">
		<p class="MateriasTitulo">
			<?php echo $interview['Interview']['name']; ?>
		</p>
		
		<div class="row">
			<div class="col-md-6">
				<p class="MateriasData">
					<?php echo $this->Time->format('d.m.Y', $interview['Interview']['created'], null, 'America/Sao_Paulo'); ?>
				</p>
			</div>
			
			<div class="col-md-6">
				<div class="MateriasShare">
					<div id="share_twitter">
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt">Tweet</a>
					</div>
					<div id="share_facebook">
						<?php
							$link = array('controller' => 'news', 'action' => 'view', 'slug' => $this->Link->makeLink($interview['Interview']['slug'], $interview['Interview']['id'])); 
						?>
						
						<div class="fb-share-button" data-href="<?php $this->Html->url($link); ?>" data-width="200" data-type="button_count"></div>
					</div>					
 					<a href="javascript:window.print()">
	 					<img src="<?php echo $this->Html->url('/imagens/icon_Print.png'); ?>" />
					</a>
				</div>
			</div>
		</div>
		
		<hr />
		
		<p class="MateriasSubtituloGR">
			<?php echo $interview['Interview']['subtitulo']; ?>
		</p>
		
		<p class="MateriasTexto">
			<?php 
				if (sizeof($interview['Photo']) > 0) {
					$fotoPrincipal = $interview['Photo'][0];
					
					$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
			?>
				<div class="MateriasFoto">
					<div class="MateriasFotoClip">
						<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive" />
					</div>
					<div class="MateriasFotoLegenda">
						<p class="MateriasLegendas">
							<?php echo $fotoPrincipal['legenda']; ?>
							<?php if (!empty($fotoPrincipal['credito'])) echo " / "; echo $fotoPrincipal['credito']  ?>
						</p>
					</div>
				</div>
			<?php
				}
			?>
			<?php echo $interview['Interview']['texto']; ?>
		</p>
	</div>
	<?php echo $this->element('entrevistas/ultimas'); ?>
</div>
  <!-- MATERIA ABERTA -->
  
<?php 
	echo $this->element('estabelecimentos/outros', 
						array(), 
						array("cache" => array('config' => 'short', 'key' => 'outros_historia')
		)); 
?>