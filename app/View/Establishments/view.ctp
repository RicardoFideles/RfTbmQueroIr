<?php
	//var_dump($category['Category']['name']);
	
	//var_dump($establishment);
?>


<?php   $this->set(array(
	    'title_for_layout' => $establishment['Establishment']['name']
	));
?>
<?php echo $this->element('facebook/sdk'); ?>

<?php 
	
	$idEstab =  $establishment['Establishment']['id'];
	
	$media_visual = 0;
	
	if (!empty($establishment['Establishment']['visual']) && !empty($establishment['Establishment']['visual_count'])) {
		if ($establishment['Establishment']['visual'] > 0 && $establishment['Establishment']['visual_count'] > 0) {
			$media_visual =  $establishment['Establishment']['visual'] / $establishment['Establishment']['visual_count'];
		}
			
	}
	
	$media_auditiva = 0;
	
	if (!empty($establishment['Establishment']['auditiva']) && !empty($establishment['Establishment']['auditiva_count'])) {
		if ($establishment['Establishment']['auditiva'] > 0 && $establishment['Establishment']['auditiva_count'] > 0) {
			$media_auditiva =  $establishment['Establishment']['auditiva'] / $establishment['Establishment']['auditiva_count'];
		}
			
	}
	
	$media_motora = 0;
	
	if (!empty($establishment['Establishment']['motora']) && !empty($establishment['Establishment']['motora_count'])) {
		if ($establishment['Establishment']['motora'] > 0 && $establishment['Establishment']['motora_count'] > 0) {
			$media_motora =  $establishment['Establishment']['motora'] / $establishment['Establishment']['motora_count'];
		}
			
	}
	
	$media_intelectual = 0;
	
	if (!empty($establishment['Establishment']['intelectual']) && !empty($establishment['Establishment']['intelectual_count'])) {
		if ($establishment['Establishment']['intelectual'] > 0 && $establishment['Establishment']['intelectual_count'] > 0) {
			$media_intelectual =  $establishment['Establishment']['intelectual'] / $establishment['Establishment']['intelectual_count'];
		}
			
	}
	
	
	
?>


<script type="text/javascript">
	
	
	$(document).ready(function() {
		
		$('#visual').raty({ readOnly: true, score: <?php echo $media_visual; ?>, path: '/js/ratting/img'});
		$('#auditiva').raty({ readOnly: true, score: <?php echo $media_auditiva; ?>, path: '/js/ratting/img' });
		$('#motora').raty({ readOnly: true, score: <?php echo $media_motora; ?>, path: '/js/ratting/img' });
		$('#intelectual').raty({ readOnly: true, score: <?php echo $media_intelectual; ?>, path: '/js/ratting/img' });
		
		$('#visual_usr').raty({
		  target    : '#visualInput',
		  targetType: 'number',
		  path: '/js/ratting/img',
		  targetKeep: true,
		  
		});
		
		$('#auditiva_usr').raty({
		  target    : '#auditivaInput',
		  targetType: 'number',
		  path: '/js/ratting/img',
		  targetKeep: true,
		});
		
		$('#motora_usr').raty({
		  target    : '#motoraInput',
		  targetType: 'number',
		  path: '/js/ratting/img',
		  targetKeep: true,

		});
		
		$('#intelectual_usr').raty({
		  target    : '#intelectualInput',
		  targetType: 'number',
		  path: '/js/ratting/img',
		  targetKeep: true,
		});
				
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
				<div class="col-md-1 printColDEstabelecIcon">
					<img src="<?php echo $this->Html->url($url) ?>" class="CategoriasIconSM" />
				</div>
			<?php
				}
			?>
			
			<div class="col-md-11 printColDEstabelecNome EstabelecimentoCategoriaFixPos">
				<p class="TitulosInternas fonteSiteSouvLight">
					<?php echo $category['Category']['name']; ?>
				</p>
			</div>
		</div>
		<hr class="hrTitulos" />
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<p class="TitulosInternas fonteSiteSouvLight textColorC text-left">
					<?php echo $establishment['Establishment']['name'] ?>
				</p>
			</div>
			<div class="col-md-3"></div>
		</div>
		<hr />
	</div>

	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-12 marginBottomA printColA">
				<p class="fonteSiteSouvMedium textColorC EstabelecimentoSubTitulos">ACESSIBILIDADE</p>
				<div class="row marginBottomA">
					
					<div class="col-md-2">
						<img src="<?php echo $this->Html->url('/imagens/icon_DefVisual.png'); ?>" class="CategoriasIconXXS" />
					</div>
					<div class="col-md-9 col-md-offset-1 marginBottomA EstabelecimentoInfos">
						VISUAL<br />
						<div id="visual" class="rating">&nbsp;</div>
					</div>
	
					<div class="col-md-2">
						<img src="<?php echo $this->Html->url('/imagens/icon_DefAuditiva.png'); ?>" class="CategoriasIconXXS" />
					</div>
					<div class="col-md-9 col-md-offset-1 marginBottomA EstabelecimentoInfos">
						AUDITIVA<br />
						<div id="auditiva" class="rating">&nbsp;</div>
					</div>

					<div class="col-md-2">
						<img src="<?php echo $this->Html->url('/imagens/icon_DefMotora.png'); ?>" class="CategoriasIconXXS" />
					</div>
					<div class="col-md-9 col-md-offset-1 marginBottomA EstabelecimentoInfos">
						MOTORA<br />
						<div id="motora" class="rating">&nbsp;</div>
					</div>
	
					<div class="col-md-2">
						<img src="<?php echo $this->Html->url('/imagens/icon_DefIntelectual.png'); ?>" class="CategoriasIconXXS" />
					</div>
					<div class="col-md-9 col-md-offset-1 marginBottomA EstabelecimentoInfos">
						INTELECTUAL<br />
						<div id="intelectual" class="rating">&nbsp;</div>
					</div>
				</div>

				<p class="fonteSiteSouvMedium textColorC EstabelecimentoSubTitulos">
					INFORMAÇÕES
				</p>
				
				<p class="EstabelecimentoInfos">
					<?php echo $establishment['Establishment']['informacoes']; ?>
				</p>
				
				<p>Site:</p>
				<p>
					<?php 
						$site = $establishment['Establishment']['site'];
					?>
					<a href="<?php echo $this->Html->url($site); ?>" class="LinkEstabelecimentoSite">
						<?php echo $establishment['Establishment']['name'] ?>
					</a>
				</p>
			</div>

			<div class="col-md-7 col-sm-7 col-xs-12 marginBottomA printColB">
				
				<div class="EstabelecimentosShare">
					<div id="share_twitter">
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt">Tweet</a>
					</div>
					<div id="share_facebook">
						<?php
							$link = array('controller' => 'news', 'action' => 'view', 'slug' => $this->Link->makeLink($establishment['Establishment']['slug'], $establishment['Establishment']['id'])); 
						?>
						
						<div class="fb-share-button" data-href="<?php $this->Html->url($link); ?>" data-width="200" data-type="button_count"></div>
					</div>
					<a href="javascript:window.print()">
	 					<img src="<?php echo $this->Html->url('/imagens/icon_Print.png'); ?>" />
					</a>					
				</div>
			
				<?php echo $establishment['Establishment']['texto']; ?>
				
				<div class="row">
					<?php 
						
						$fotos = $establishment['Photo'];
						 
						foreach ($fotos as $foto): ?>
						<div class="col-md-3 col-sm-3 col-xs-3 marginBottomA EstabThumbImageCrop">
							<div>
								<?php 
									$url = $this->Link->makeLinkImgDir('original', $foto['imagem'], 'fotos');
								?>
								<a class="example-image-link" href="<?php echo $this->Html->url($url) ?>" data-lightbox="example-set" title="Aqui entra a legenda1">
									<img src="<?php echo $this->Html->url($url) ?>" class="" alt="aqui entra o alt 1" />
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php echo $this->element('estabelecimentos/ultimas'); ?>
		</div>
	</div>

</div>
  <!-- ESTABELECIMENTO -->
  
<!-- COMENTARIOS-->
                    
<div class="row hidden-print">
	<div class="col-md-12 col-sm-12 col-xs-12 bkgRodapeOutrosEstab marginTopA marginBottomA OutrosEstabTitulo"></div>
	
	<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 marginBottomA">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p class="MateriasOutrasTituloCol fonteSiteSouvMedium textColorC">
					<?php 
						$comentarios = $establishment['Comment']; 
					?>
					Comentários <span class="fonteSiteSouvLight">(<?php echo sizeof($comentarios); ?>)</span>
				</p>
				
				<p>Avalie e comente, sua opinião é importante para nós.</p>
			</div>

			<div id="containerVotacao">
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="row">
						<div class="col-md-2">
							<img src="<?php echo $this->Html->url('/imagens/icon_DefVisual.png'); ?> " class="CategoriasIconXXS" />
						</div>
						<div class="col-md-8 col-md-offset-1 EstabelecimentoInfos">VISUAL<br />
							<div id="visual_usr" class="rating">&nbsp;</div>							
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="row">
						<div class="col-md-2">
							<img src="<?php echo $this->Html->url('/imagens/icon_DefAuditiva.png'); ?> " class="CategoriasIconXXS" />
						</div>
						<div class="col-md-8 col-md-offset-1 EstabelecimentoInfos">AUDITIVA<br />
							<div id="auditiva_usr" class="rating">&nbsp;</div>							
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="row">
						<div class="col-md-2">
							<img src="<?php echo $this->Html->url('/imagens/icon_DefMotora.png'); ?> " class="CategoriasIconXXS" />
						</div>
						<div class="col-md-8 col-md-offset-1 EstabelecimentoInfos">MOTORA<br />
							<div id="motora_usr" class="rating">&nbsp;</div>							
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="row">
						<div class="col-md-2">
							<img src="<?php echo $this->Html->url('/imagens/icon_DefIntelectual.png'); ?> " class="CategoriasIconXXS" />
						</div>
						<div class="col-md-8 col-md-offset-1 EstabelecimentoInfos">INTELECTUAL<br />
							<div id="intelectual_usr" class="rating">&nbsp;</div>							
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 marginBottomB">
 
					<?php echo $this->Form->create('Comment', array('controller' =>'comments', 'action' => 'add', 'role' => 'form')); ?>
					
					<input type="hidden" name="data[Establishment][id]" value="<?php echo $idEstab; ?>" />
					
					<input type="hidden" name="data[Establishment][visual]" value="" id="visualInput"/>
					
					<input type="hidden" name="data[Establishment][motora]" value="" id="motoraInput"/>
					
					<input type="hidden" name="data[Establishment][auditiva]" value="" id="auditivaInput"/>
					
					<input type="hidden" name="data[Establishment][intelectual]" value="" id="intelectualInput"/>
					
					<?php echo $this->Form->input('texto', array('rows'=>'3', 'class'=>'form-control')); ?>
					
					<?php echo $this->Form->input('status', array('type'=>'hidden')); ?>
					
					<?php echo $this->Form->input('user_id', array('type'=>'hidden')); ?>
					
					<?php echo $this->Form->input('establishment_id', array('type'=>'hidden')); ?>
										
					<div id="recaptcha_widget">
						<?php echo $this->Recaptcha->display(array('recaptchaOptions'=>array('theme' => 'clean'))); ?>
						<div id="msg_retorno">
							<?php echo $this->Session->flash() ?>
						</div>
					</div>

					<br /><br />
					<button type="submit" class="btn btn-tbqueroirE">Submit</button>
				<?php echo $this->Form->end();?>

			</div>
			
			

			<div class="col-md-12 col-sm-12 col-xs-12">
				
				<?php
					
					foreach ($comentarios as $comentario): ?>
					
					<?php
						
						if ($comentario['status'] == 'aprovado') {
					?>
					
						<div class="row marginBottomA">
							<div class="col-md-2 col-sm-2 col-xs-4 text-center">
								<?php
								
									$id_user = $comentario['User']['id']; 
								
									$photo_user = $this->requestAction(array('controller' => 'photos', 'action' => 'recuperaFoto', $id_user ));
									
									if (!empty($photo_user) && sizeof($photo_user) > 0) {
										
										$url = $this->Link->makeLinkImgDir('original', $photo_user['Photo']['imagem'], 'fotos');
								?>
									<img src="<?php echo $this->Html->url($url) ?>" class="FotoUserXS" />
								
								<?php		
									}
								?>		
								
							</div>
							<div class="col-md-10 col-sm-10 col-xs-11">
								<p class="ComentarioNome MarginPaddingZera">
									<?php
										echo $comentario['User']['name']; 
									?>
								</p>
								<p class="ComentarioTexto MarginPaddingZera">
									<?php
										echo $comentario['texto'] 
									?>
								</p>
							</div>
						</div>
					
					<?php
						}
					
					?>
					
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>                    
<!-- COMENTARIOS-->
