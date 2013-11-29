<div class="latests view">
<h2><?php echo __('Latest'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($latest['Latest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($latest['Latest']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($latest['Latest']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Latest'), array('action' => 'edit', $latest['Latest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Latest'), array('action' => 'delete', $latest['Latest']['id']), null, __('Are you sure you want to delete # %s?', $latest['Latest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Latests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Latest'), array('action' => 'add')); ?> </li>
	</ul>
</div>
