<?php
	
	$id_category = $category['Category']['id'];
	$destaques = $this->requestAction(array('controller' => 'establishments', 'action' => 'topHomeCategorias', $id_category));
	
	$lista_1 = array();
	$lista_2 = array();
	
	
	if (sizeof($establishments) > 2) {
		array_push ($lista_1, $establishments[0], $establishments[1]);
		unset ($establishments[0], $establishments[1]);
		$lista_2 = $establishments;
		
	} else{
		$lista_1 = $establishments;
	}
	
?>

<?php   $this->set(array(
	    'title_for_layout' => 'Estabelecimentos'
	));
?>

<script type="text/javascript">
	
	
	$(document).ready(function() {
		
		<?php foreach($destaques as $key => $destaque): ?>
			$('#destaque_<?php echo $key+1; ?>').raty({ readOnly: true, score: <?php echo $destaque['Establishment']['media']; ?>, path: '/js/ratting/img'});
		<?php endforeach; ?>
	});
	</script>

<!-- ESTABELECIMENTO -->
<div class="row marginTopB marginBottomB">
	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">
		<div class="row">
			
			<?php 
				if (sizeof($category['Photo']) > 0) {
					$fotoPrincipal = $category['Photo'][0];
					
					$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
			?>
				<div class="col-md-1 col-sm-1 col-xs-3 printColDEstabelecIcon">
					<img src="<?php echo $this->Html->url($url) ?>" class="CategoriasIconSM" />
				</div>
			<?php
				}
			?>
			
			<div class="col-md-11 col-sm-11 col-xs-9 printColDEstabelecNome EstabelecimentoCategoriaFixPos">
				<p class="TitulosInternas fonteSiteSouvLight">
					<?php echo $category['Category']['name']; ?>
				</p>
			</div>
		</div>
		<hr class="hrTitulos" />
	</div>

	<div class="col-md-12">
		<div class="row">
			<?php foreach ($lista_1 as $establishment): ?>
				<div class="col-md-3 col-sm-3 col-xs-12 marginBottomA">
					
					<?php 
						$link = array('controller' => 'establishments', 'action' => 'view', 'slug' => $this->Link->makeLink($establishment['Establishment']['slug'], $establishment['Establishment']['id']));
						 
					?>
					<a href="<?php echo $this->Html->url($link); ?>" class="LinkCategoriasLugares fonteSiteSouvLight">
						
						<?php 
							if (sizeof($establishment['Photo']) > 0) {
								$fotoPrincipal = $establishment['Photo'][0];
								
								$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
								
								
								
						?>
							<div class="CategImageCrop">
								<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive fotoSize marginBottomIMG" />
							</div>
						<?php
							}
						?>
						
						<p class="fonteSiteSouvLight">
							<?php echo $establishment['Establishment']['name']; ?>
						</p>
					</a>
					<?php echo $establishment['Establishment']['breve']; ?> 
				</div>
			<?php endforeach; ?>
	
			<!-- TOP5 -->                      
			<div class="col-md-6 col-sm-6 col-xs-12 marginBottomA">
				<div class="row">
					<div class="col-md-2 col-sm-3 col-xs-4 text-center">
						<img src="<?php echo $this->Html->url('/imagens/icon_TOP5.png'); ?>" />
					</div>
					<div class="col-md-10 col-sm-8 col-xs-8">
						<p class="Top5RankingBKGTituloP1 fonteSiteSouvDemi">TOP 5 RANKING</p>
						<p class="Top5RankingBKGTituloP2 fonteSiteSouvLight">Acessibilidade</p>
					</div>
				</div>
	        
				<div class="col-md-12 col-sm-12 col-xs-12 RoundedCornerEmCima RoundedCornerEmBaixo Top5RankingBKGInterna">
					
					<?php 
						$tamanho_array = sizeof($destaques);
						foreach($destaques as $key => $destaque): ?>
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-1 Top5RankingPosicaoInterna fonteSiteSouvLight">
								<?php echo $key+1; ?>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-7 Top5RankingLugarAvaliacao">
								<?php 
								$link = array('controller' => 'establishments', 'action' => 'view', 'slug' => $this->Link->makeLink($destaque['Establishment']['slug'], $destaque['Establishment']['id']));
								 
							?>
								<a href="<?php echo $this->Html->url($link); ?>" class="LinkTop5Lugar">
									<?php echo $destaque['Establishment']['name']; ?>
								</a>
								<br />
							</div>
							<div id="destaque_<?php echo $key+1; ?>" class="col-md-3 col-sm-3 col-xs-4 Top5RankingLugarAvaliacao Top5RankingLugarAvaliacaoStarsInterna"></div>
						</div>
						
						<?php 
							if ($tamanho_array != $key+1) {
						?>
						
						<div class="row">
							<hr class="hrTop5Interna" />
						</div>
						
						<?php
							}
						?>
					<?php endforeach; ?>
					
				</div>
			</div>
			<!-- TOP5 -->                      
		</div>
	</div>
	
	<?php if (sizeof($lista_2) > 0) { ?>
		
	<div class="col-md-12">
		<div class="row">
			<?php foreach ($lista_2 as $establishment): ?>
				<div class="col-md-3 col-sm-3 col-xs-12 marginBottomA">
					
					<?php 
						$link = array('controller' => 'establishments', 'action' => 'view', 'slug' => $this->Link->makeLink($establishment['Establishment']['slug'], $establishment['Establishment']['id']));
						 
					?>
					<a href="<?php echo $this->Html->url($link); ?>" class="LinkCategoriasLugares fonteSiteSouvLight">
						<?php 
							if (sizeof($establishment['Photo']) > 0) {
								$fotoPrincipal = $establishment['Photo'][0];
								
								$url = $this->Link->makeLinkImgDir('original', $fotoPrincipal['imagem'], 'fotos');
								
						?>
							<div class="CategImageCrop">
								<img src="<?php echo $this->Html->url($url) ?>" class="img-responsive fotoSize marginBottomIMG" />
							</div>
						<?php
							}
						?>
						<p class="fonteSiteSouvLight">
							<?php echo $establishment['Establishment']['name']; ?>
						</p>
					</a>
					<?php echo $establishment['Establishment']['breve']; ?> 
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php }?>

</div>

<?php
	if (!empty($establishment) && !empty($establishment['Category']) && !empty($establishment['Category']['slug'])) {
?>

<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-6">
		<p class="InternasPaginacao">
			<?php
				$slug = $establishment['Category']['slug'];
				
				//Passando a url a ser utilizada pelo paginator.
				$this->Paginator->options(array(
				    'url' => array(
				        'controller' => 'establishments', 'action' => 'lista', 'slug' => $slug,
				    )
				));
				
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

<?php
	}
?>

  <!-- ESTABELECIMENTO -->
  
