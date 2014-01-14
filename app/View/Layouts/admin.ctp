<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Starlight Premium Admin Template</title>
    
    <link rel="stylesheet" href="<?php echo $this->Html->url('/css/admin/css/style.css'); ?>" type="text/css" />
    <!--[if IE 9]>
        <link rel="stylesheet" media="screen" href="<?php echo $this->Html->url('/css/admin/css/ie9.css'); ?>"/>
    <![endif]-->
    
    <!--[if IE 8]>
        <link rel="stylesheet" media="screen" href="<?php echo $this->Html->url('/css/admin/css/ie8.css'); ?>"/>
    <![endif]-->
    
    <!--[if IE 7]>
        <link rel="stylesheet" media="screen" href="<?php echo $this->Html->url('/css/admin/css/ie7.css'); ?>"/>
    <![endif]
	 -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo $this->Html->url('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->Html->url('/js/admin/js/custom/general.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->Html->url('/js/admin/js/custom/dashboard.js'); ?>"></script>
    <!--[if lt IE 9]>
    	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
   
</head>

<body class="loggedin">
    <?php echo $this->element('admin/topbar'); ?>
     <div class="mainwrapper">
     	<div class="mainwrapperinner">
     		<?php echo $this->element('admin/dashboard'); ?>
     		<div class="maincontent noright">
        		<div class="maincontentinner">
        			<?php echo $this->Session->flash() ?>
                <?php echo $this->Session->flash('auth') ?>
    				<?php echo $this->fetch('content') ?>
    			</div>
			</div>
		</div>
	</div>
</body>

</html>