<div class="categoriesCities form">
<?php echo $this->Form->create('CategoriesCity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categories City'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('city_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategoriesCity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CategoriesCity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Cities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
