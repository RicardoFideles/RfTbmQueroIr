<div class="latests form">
<?php echo $this->Form->create('Latest'); ?>
	<fieldset>
		<legend><?php echo __('Add Latest'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('link');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Latests'), array('action' => 'index')); ?></li>
	</ul>
</div>
