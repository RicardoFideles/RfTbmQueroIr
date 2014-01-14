<div class="content">
	<div class="contenttitle radiusbottom0">
		<h2 class="table"><span>Comentários</span></h2>
	</div>
	<div class="dataTables_wrapper" id="dyntable_wrapper">
		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
			<colgroup>
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			
			<thead>
				<tr>
					<th class="head0"><?php echo $this->Paginator->sort('Estabelecimento');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Autor');?></th>
					<th class="head0"><?php echo $this->Paginator->sort('Comentário');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Status');?></th>
					<th class="head0"><?php echo __('Ações');?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<th class="head0"><?php echo $this->Paginator->sort('Estabelecimento');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Autor');?></th>
					<th class="head0"><?php echo $this->Paginator->sort('Comentário');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Status');?></th>
					<th class="head0"><?php echo __('Ações');?></th>
				</tr>
			</tfoot>
			
			<tbody>
				<?php foreach ($comments as $comment): ?>
					<tr class="gradeX">
						<td><?php echo h($comment['Establishment']['name']); ?>&nbsp;</td>
						<td><?php echo h($comment['User']['name']); ?>&nbsp;</td>
						 <td><?php echo h($comment['Comment']['texto']); ?>&nbsp;</td>
						<td class="center_commets">
							<?php 
								$status = $comment['Comment']['status'];
								
								if ($status == 'aprovado') {
							?>
								<img src="<?php echo $this->Html->url('/images/admin/icon_StatusAprovado.png'); ?>" alt="" class="radius2" />
							<?php
							
								} else {
									if($status == 'aguardando') {
							?>
								<img src="<?php echo $this->Html->url('/images/admin/icon_StatusAprovar.png'); ?>" alt="" class="radius2" />
							<?php
									} else {
							?>
								<img src="<?php echo $this->Html->url('/images/admin/icon_StatusNegado.png'); ?>" alt="" class="radius2" />
							<?php
									}	
								}
							?>
							&nbsp;
						</td>
						<td class="center">
							<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $comment['Comment']['id'])); ?>
							<?php echo $this->Form->postLink(__('Aprovar'), array('action' => 'aprove', $comment['Comment']['id']), null, __('Você tem certeza que deseja aprovar # %s?', $comment['Comment']['id'])); ?>
							<?php echo $this->Form->postLink(__('Rejeitar'), array('action' => 'delete', $comment['Comment']['id']), null, __('Você tem certeza que deseja rejeitar # %s?', $comment['Comment']['id'])); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'apagar', $comment['Comment']['id']), null, __('Você tem certeza que deseja apagar # %s?', $comment['Comment']['id'])); ?>

						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div id="dyntable_info" class="dataTables_info">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, exibindo {:current} registros de {:count} no total')
				));
			?>
		</div>
		<div id="dyntable_paginate" class="dataTables_paginate paging_full_numbers">
			<?php
				echo $this->Paginator->prev('< ', array('tag' => 'span' , 'class'=> 'previous paginate_button paginate_button'), null, array('class' => 'previous paginate_button paginate_button_disabled', 'tag' => 'span'));
	            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'span' , 'class' => 'paginate_button'));
	            $this->Paginator->current(null, null, array('class' => 'paginate_active'));
	            echo $this->Paginator->next(' >', array('tag' => 'span', 'class'=> 'next paginate_button'), null, array('class' => 'next paginate_button paginate_button_disabled','tag' => 'span'));
			?>
		</div>
	</div>
                
	<br clear="all" />
</div>

<style type="text/css">

.center_commets {
	text-align: center;
}
	
</style>
