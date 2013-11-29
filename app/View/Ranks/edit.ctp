<div class="ranks form">
<?php echo $this->Form->create('Rank'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rank'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('establishments_id');
		echo $this->Form->input('visual');
		echo $this->Form->input('auditiva');
		echo $this->Form->input('motora');
		echo $this->Form->input('intelectual');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rank.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rank.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ranks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishments'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
	</ul>
</div>
