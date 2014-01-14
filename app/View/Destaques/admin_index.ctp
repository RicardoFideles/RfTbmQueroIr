<?php
	$id_destaque = $destaques[0]['Destaque']['posicao_1'];
	$destaque_principal = $this->requestAction(array('controller' => 'news', 'action' => 'carrega', $id_destaque));
?>

<div class="content">
	<div class="contenttitle radiusbottom0">
		<h2 class="table"><span>Destaques na Home</span></h2>
	</div>
	<div class="dataTables_wrapper" id="dyntable_wrapper">
		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
			<colgroup>
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			
			<thead>
				<tr>
					<th class="head0"><?php echo $this->Paginator->sort('Destaque Principal');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Matéria em destaque');?></th>
					<th class="head0"><?php echo $this->Paginator->sort('Minha História em destaque');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Entrevista em destaque');?></th>
					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<th class="head0"><?php echo $this->Paginator->sort('Destaque Principal');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Matéria em destaque');?></th>
					<th class="head0"><?php echo $this->Paginator->sort('Minha História em destaque');?></th>
					<th class="head1"><?php echo $this->Paginator->sort('Entrevista em destaque');?></th>
					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</tfoot>
			
			<tbody>
				<?php foreach ($destaques as $destaque): ?>
					<tr class="gradeX">
						<td><?php echo h($destaque_principal['News']['name']); ?>&nbsp;</td>
						<td><?php echo h($destaque['News']['name']); ?>&nbsp;</td>
						<td><?php echo h($destaque['Person']['name']); ?>&nbsp;</td>
						<td><?php echo h($destaque['Interview']['name']); ?>&nbsp;</td>
						<td class="center">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $destaque['Destaque']['id'])); ?>
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
