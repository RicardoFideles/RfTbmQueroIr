<?php
	$cakeDescription = __d('cake_dev', 'Também Quero Ir');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

        echo $this->Html->css(array ('bootstrap.min', 'css_tambemqueroir','lightbox','rating'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

    <link href="<?php echo $this->Html->url('/css/css_tambemqueroir_print.css'); ?>" rel="stylesheet" media="print">
    <link href="<?php echo $this->Html->url('/css/ticker-style.css'); ?>" rel="stylesheet">
    

	
	<link href="<?php echo $this->Html->url('/img/favicon_pc.png'); ?>" rel="icon" type="image/png" />
    <link href="<?php echo $this->Html->url('/img/favicon_apple.png'); ?>" rel="apple-touch-icon-precomposed"/>
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo $this->Html->url('https://code.jquery.com/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->Html->url('/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery.ticker.js'); ?>" ></script>
	<script type="text/javascript" src="<?php echo $this->Html->url('/js/ratting/jquery.raty.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $this->Html->url('/js/lightbox-2.6.min.js'); ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bkgBody">
	
    <?php echo $this->element('header/barra'); ?>
    
    <div class="container">
	    <?php echo $this->element('header/logo'); ?>
	    
	    <div class="row text-center bkgD RoundedCornerEmCima NoCutMenu">  
		    <?php echo $this->element('header/menu'); ?>
			<div class="col-md-12 text-left marginTopA">
			    <?php echo $this->fetch('content'); ?>
				
				<?php echo $this->element('footer/institucional'); ?>
			</div>
		</div>
	</div>
	
    
    <?php echo $this->element('footer/index'); ?>
    <?php echo $this->element('footer/copy'); ?>
    <?php echo $this->element('google/analytics'); ?>
	
	
</body>
</html>
