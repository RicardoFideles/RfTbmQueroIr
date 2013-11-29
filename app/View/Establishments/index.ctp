<div class="establishments index">
	<h2><?php echo __('Establishments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('texto'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($establishments as $establishment): ?>
	<tr>
		<td><?php echo h($establishment['Establishment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($establishment['Category']['name'], array('controller' => 'categories', 'action' => 'view', $establishment['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($establishment['City']['name'], array('controller' => 'cities', 'action' => 'view', $establishment['City']['id'])); ?>
		</td>
		<td><?php echo h($establishment['Establishment']['name']); ?>&nbsp;</td>
		<td><?php echo h($establishment['Establishment']['texto']); ?>&nbsp;</td>
		<td><?php echo h($establishment['Establishment']['address']); ?>&nbsp;</td>
		<td><?php echo h($establishment['Establishment']['created']); ?>&nbsp;</td>
		<td><?php echo h($establishment['Establishment']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $establishment['Establishment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $establishment['Establishment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $establishment['Establishment']['id']), null, __('Are you sure you want to delete # %s?', $establishment['Establishment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Establishment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
