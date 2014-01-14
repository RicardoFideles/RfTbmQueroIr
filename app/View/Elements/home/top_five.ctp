<?php
	$destaques = $this->requestAction(array('controller' => 'establishments', 'action' => 'topHome'));
?>




<div class="col-md-3 col-sm-4 col-xs-12 HomeAltMinA">
	<div class="row">
		<div class="col-md-3  col-md-offset-1 col-sm-3 col-xs-4 text-center">
			<img src="<?php echo $this->Html->url('/imagens/icon_TOP5.png'); ?> " />
		</div>
		
		<div class="col-md-8 col-sm-8 col-xs-8">
			<p class="Top5RankingBKGTituloP1 fonteSiteSouvDemi">
				TOP 5 RANKING
			</p>
			<p class="Top5RankingBKGTituloP2 fonteSiteSouvLight">
				Acessibilidade
			</p>
		</div>
	</div>
	
	
	<script type="text/javascript">
	
	
	$(document).ready(function() {
		
		<?php foreach($destaques as $key => $destaque): ?>
			$('#destaque_<?php echo $key+1; ?>').raty({ readOnly: true, score: <?php echo $destaque['Establishment']['media']; ?>, path: '/js/ratting/img'});
		<?php endforeach; ?>
	});
	</script>
	
	<div class="row">
		<div class="col-md-11  col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-10 col-xs-offset-1 RoundedCornerEmCima RoundedCornerEmBaixo Top5RankingBKG">
			<?php foreach($destaques as $key => $destaque): ?>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 Top5RankingPosicao fonteSiteSouvLight">
						<?php echo $key+1; ?>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10 Top5RankingLugarAvaliacao">
						<?php 
						$link = array('controller' => 'establishments', 'action' => 'view', 'slug' => $this->Link->makeLink($destaque['Establishment']['slug'], $destaque['Establishment']['id']));
						 
					?>
						<a href="<?php echo $this->Html->url($link); ?>" class="LinkTop5Lugar">
							<?php echo $destaque['Establishment']['name']; ?>
						</a>
						<div id="destaque_<?php echo $key+1; ?>"></div>
						<br />
					</div>
					<div class="row">
						<hr class="hrTop5" />
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>