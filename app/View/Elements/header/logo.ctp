<!-- FAIXA LOGO -->
<!-- lg md sm  -->
<?php 
	$settings =  Configure::read('Config.settings');
?>
<div class="row FaixaLogoAltura hidden-xs hidden-print">
	<div class="col-md-4 col-md-offset-1 col-sm-6">
		<a href="<?php echo $this->Html->url('/'); ?>">
			<img src="<?php echo $this->Html->url('/imagens/LogoTopo.png') ?>" class="img-responsive">
		</a>
	</div>
	
	<div class="col-md-7 col-sm-6 col-xs-12 text-right">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<a onclick="fonte('aumentar')" href="javascript:;"><img src="<?php echo $this->Html->url('/imagens/TamLetraMais.png') ?>" /></a>
				<a onclick="fonte('resetarTam');" href="javascript:;"><img src="<?php echo $this->Html->url('/imagens/TamLetraReset.png') ?>" /></a>
				<a onclick="fonte('diminuir');" href="javascript:;"><img src="<?php echo $this->Html->url('/imagens/TamLetraMenos.png') ?>" /></a>
			</div>
			
			<div class="col-md-12 col-sm-12 FaixaLogoSlogan">
				<img src="<?php echo $this->Html->url('/imagens/SloganTopo.png') ?>"  class="img-responsive">
			</div>
			
			<div class="col-md-12 col-sm-12 FaixaLogoRedesSociais fonteSiteSouvLight">
				<span>SIGA-NOS</span>
				<a href="<?php echo $settings['Setting']['link_facebook']; ?>" id="social">
					<img src="<?php echo $this->Html->url('/imagens/RedeSocial_Facebook.png') ?>" width="27" height="27">
				</a>
				<a href="<?php echo $settings['Setting']['link_twitter']; ?>" id="social">
					<img src="<?php echo $this->Html->url('/imagens/RedeSocial_Twitter.png') ?>" width="27" height="27">
				</a>
			</div>
		</div>
	</div>
</div>
<!-- lg md sm  -->

<!-- xs  -->
<div class="row FaixaLogoAltura2 visible-xs hidden-print">
	<div class="col-xs-8 col-xs-offset-2">
		<a href="<?php echo $this->Html->url('/'); ?>">
			<img src="<?php echo $this->Html->url('/imagens/LogoTopo.png') ?>" class="img-responsive">
		</a>
	</div>
	<div class="col-xs-12 text-right">
		<div class="row hidden-xs">
			<div class="col-xs-12">
				<a onclick="fonte('aumentar')" href="javascript:;"><img src="<?php echo $this->Html->url('/imagens/TamLetraMais.png') ?>" /></a>
				<a onclick="fonte('resetarTam');" href="javascript:;"><img src="<?php echo $this->Html->url('/imagens/TamLetraReset.png') ?>" /></a>
				<a onclick="fonte('diminuir');" href="javascript:;"><img src="<?php echo $this->Html->url('/imagens/TamLetraMenos.png') ?>" /></a>
			</div>
			
			<div class="col-xs-12 FaixaLogoSlogan">
				<img src="<?php echo $this->Html->url('/imagens/SloganTopo.png') ?>"  class="img-responsive">
			</div>
			
			<div class="col-xs-12 FaixaLogoRedesSociais fonteSiteSouvLight">
				<span>SIGA-NOS</span>
				
				<a href="<?php echo $settings['Setting']['link_facebook']; ?>">
					<img src="<?php echo $this->Html->url('/imagens/RedeSocial_Facebook.png') ?>" width="27" height="27">
				</a>
				<a href="<?php echo $settings['Setting']['link_twitter']; ?>">
					<img src="<?php echo $this->Html->url('/imagens/RedeSocial_Twitter.png') ?>" width="27" height="27">
				</a>
			</div>
		</div>
	</div>
</div>
<!-- xs  -->

<script>
	function fonte(par){
		tamanho = document.body.style.fontSize;
		tamanhoPadrao = 14;
		tamanho = (!tamanho) ? 14 : parseInt(tamanho.substring(0,2));
		if(par == 'aumentar' && tamanho < 20)
			tamanho++;
		else if(par == 'diminuir' && tamanho > 10)
			tamanho--;
		else if(par == 'resetarTam')
			tamanho=tamanhoPadrao;
		document.body.style.fontSize = tamanho+"px";
	}
</script>

