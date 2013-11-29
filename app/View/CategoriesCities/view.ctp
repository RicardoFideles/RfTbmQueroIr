<div class="categoriesCities view">
<h2><?php echo __('Categories City'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesCity['CategoriesCity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCity['City']['name'], array('controller' => 'cities', 'action' => 'view', $categoriesCity['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCity['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesCity['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($categoriesCity['CategoriesCity']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories City'), array('action' => 'edit', $categoriesCity['CategoriesCity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories City'), array('action' => 'delete', $categoriesCity['CategoriesCity']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCity['CategoriesCity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Cities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories City'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
