<?php   
	$this->set(array(
        'body_class' => 'bkgBody',
    ));
	
    echo $this->Html->script(array ('enquete'));
	
?>

<div class="row">
<?php echo $this->element('home/top_five'); ?>
<?php echo $this->element('home/destaque'); ?>
<?php echo $this->element('home/enquete'); ?>

</div>
<?php echo $this->element('home/noticias'); ?>
<?php echo $this->element('home/ultimos_estabelecimentos'); ?>