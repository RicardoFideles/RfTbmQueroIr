<div class="ranks view">
<h2><?php echo __('Rank'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Establishments'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rank['Establishments']['name'], array('controller' => 'establishments', 'action' => 'view', $rank['Establishments']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visual'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['visual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Auditiva'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['auditiva']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motora'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['motora']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Intelectual'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['intelectual']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rank'), array('action' => 'edit', $rank['Rank']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rank'), array('action' => 'delete', $rank['Rank']['id']), null, __('Are you sure you want to delete # %s?', $rank['Rank']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ranks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rank'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishments'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
	</ul>
</div>
