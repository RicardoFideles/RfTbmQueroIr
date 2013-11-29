<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishment'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Establishments'); ?></h3>
	<?php if (!empty($category['Establishment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Texto'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Establishment'] as $establishment): ?>
		<tr>
			<td><?php echo $establishment['id']; ?></td>
			<td><?php echo $establishment['category_id']; ?></td>
			<td><?php echo $establishment['city_id']; ?></td>
			<td><?php echo $establishment['name']; ?></td>
			<td><?php echo $establishment['texto']; ?></td>
			<td><?php echo $establishment['address']; ?></td>
			<td><?php echo $establishment['created']; ?></td>
			<td><?php echo $establishment['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'establishments', 'action' => 'view', $establishment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'establishments', 'action' => 'edit', $establishment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'establishments', 'action' => 'delete', $establishment['id']), null, __('Are you sure you want to delete # %s?', $establishment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Establishment'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cities'); ?></h3>
	<?php if (!empty($category['City'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['City'] as $city): ?>
		<tr>
			<td><?php echo $city['id']; ?></td>
			<td><?php echo $city['name']; ?></td>
			<td><?php echo $city['slug']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cities', 'action' => 'view', $city['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cities', 'action' => 'edit', $city['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cities', 'action' => 'delete', $city['id']), null, __('Are you sure you want to delete # %s?', $city['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
