<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'people', 'action' => 'add');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Adicionar</span></a></li>
		</li>
	</ul>
	<div class="contenttitle radiusbottom0">
		<h2 class="table"><span>Minha História</span></h2>
	</div>
	<div class="dataTables_wrapper" id="dyntable_wrapper">
		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
			<colgroup>
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			
			<thead>
				<tr>
					<th class="head0"><?php echo $this->Paginator->sort('id');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Título');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Cadastrado em:');?></th>
					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<th class="head0"><?php echo $this->Paginator->sort('id');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Título');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Cadastrado em:');?></th>
					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</tfoot>
			
			<tbody>
				<?php foreach ($people as $person): ?>
					<tr class="gradeX">
						<td><?php echo h($person['Person']['id']); ?>&nbsp;</td>
						<td><?php echo h($person['Person']['name']); ?>&nbsp;</td>
						<td><?php echo $this->Time->format('d.m.Y', $person['Person']['created'], null, 'America/Sao_Paulo'); ?>&nbsp;</td>

						<td class="center">
							<?php echo $this->Html->link(__('Editar Textos'), array('action' => 'edit', $person['Person']['id'])); ?>
							<?php echo $this->Html->link(__('Editar Fotos'), array('action' => 'view', $person['Person']['id'])); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $person['Person']['id']), null, __('Você tem certeza que deseja apagar # %s?', $person['Person']['name'])); ?>
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
