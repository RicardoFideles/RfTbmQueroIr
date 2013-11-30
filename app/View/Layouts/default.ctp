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

        echo $this->Html->css(array ('bootstrap.min', 'css_tambemqueroir'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo $this->Html->url('https://code.jquery.com/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->Html->url('/js/bootstrap.min.js'); ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="<?php if (isset($body_class)) echo $body_class ?>">
	
    <?php echo $this->element('header/barra'); ?>
    
    <div class="container">
	    <?php echo $this->element('header/logo'); ?>
	</div>

    <?php echo $this->fetch('content'); ?>
    
    <?php echo $this->element('footer/index'); ?>
    <?php echo $this->element('footer/copy'); ?>
	
	
</body>
</html>
