<div class="ranks index">
	<h2><?php echo __('Ranks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('establishments_id'); ?></th>
			<th><?php echo $this->Paginator->sort('visual'); ?></th>
			<th><?php echo $this->Paginator->sort('auditiva'); ?></th>
			<th><?php echo $this->Paginator->sort('motora'); ?></th>
			<th><?php echo $this->Paginator->sort('intelectual'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ranks as $rank): ?>
	<tr>
		<td><?php echo h($rank['Rank']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rank['Establishments']['name'], array('controller' => 'establishments', 'action' => 'view', $rank['Establishments']['id'])); ?>
		</td>
		<td><?php echo h($rank['Rank']['visual']); ?>&nbsp;</td>
		<td><?php echo h($rank['Rank']['auditiva']); ?>&nbsp;</td>
		<td><?php echo h($rank['Rank']['motora']); ?>&nbsp;</td>
		<td><?php echo h($rank['Rank']['intelectual']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rank['Rank']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rank['Rank']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rank['Rank']['id']), null, __('Are you sure you want to delete # %s?', $rank['Rank']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rank'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishments'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
	</ul>
</div>
