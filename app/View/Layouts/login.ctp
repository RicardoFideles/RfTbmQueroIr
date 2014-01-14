<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Painel Administrativo</title>

<link rel="stylesheet" href="<?php echo $this->Html->url('/css/admin/css/style.css'); ?>" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/admin/js/plugins/jquery-ui-1.8.16.custom.min.js'); ?>"></script>



<script type="text/javascript">
    $(document).ready(function(){
       
       var erro = $('.loginerror p').length;
       
        if (erro > 1) {
            $('.loginerror').show();
        }
    });
</script>
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="login">
    <div class="loginbox radius3">
        <div class="loginboxinner radius3">
            <div class="loginheader">
                <h1 class="bebas">Painel de Controle</h1>
            </div>
            
            <div class="loginform">
                <?php echo $this->Session->flash() ?>
                <?php echo $this->Session->flash('auth') ?>
                <?php echo $this->fetch('content') ?>
            </div>
        </div>
    </div>
</body>
</html>
