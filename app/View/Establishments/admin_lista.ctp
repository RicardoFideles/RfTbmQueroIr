<?php
	$categories = $this->requestAction(array('controller' => 'Categories', 'action' => 'lista_categorias'));
	
?>
<div class="content">
	<ul class="buttonlist">
		<li>
			<a href="<?php $link = array('controller' => 'establishments', 'action' => 'destaque'); echo $this->Html->url($link); ?>" class="btn btn_book">
				<span>Voltar</span>
			</a>
		</li>
	</ul>
	<div class="contenttitle radiusbottom0">
		<h2 class="table"><span>Estabelecimentos em Destaque em : <?php echo $city['City']['name'] ?></span></h2>
	</div>
	<div class="dataTables_wrapper" id="dyntable_wrapper">
		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
			<colgroup>
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			
			<thead>
				<tr>
					<th class="head0"><?php echo 'Nome'; ?></th>
					<th class="head1"><?php echo 'Cidade' ;?></th>
					<th class="head0"><?php echo 'Categoria' ;?></th>
					<th class="head1"><?php echo 'Destaque';?></th>

					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<th class="head0"><?php echo 'Nome';?></th>
					<th class="head1"><?php echo 'Cidade';?></th>
					<th class="head0"><?php echo 'Categoria';?></th>
					<th class="head1"><?php echo 'Destaque';?></th>
					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</tfoot>
			
			<tbody>
				<?php foreach ($establishments as $establishment): ?>
					<tr class="gradeX">
						<td><?php echo h($establishment['Establishment']['name']); ?>&nbsp;</td>
						<td><?php echo h($establishment['City']['name']); ?>&nbsp;</td>
						<td><?php echo h($establishment['Category']['name']); ?>&nbsp;</td>
						<td><?php echo h($establishment['Establishment']['destaque']); ?>&nbsp;</td>
						<td class="center">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit_destaque', $establishment['Establishment']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
                
	<br clear="all" />
	
	<div class="contenttitle radiusbottom0">
		<h2 class="table"><span>Pesquisar estabelecimentos :</span></h2>
	</div>
	<div class="dataTables_wrapper" id="dyntable_wrapper">
		
		<?php
			$id_cidade = $city['City']['id']; 
			$link = array('controller' => 'establishments', 'action' => 'pesquisar', $id_cidade);
		?>
		<form action= "<?php echo $this->Html->url($link)?>" id="pesquisar" class="stdform stdform2" method="post" accept-charset="utf-8">
		
		<br />
		
	    <p class="primeiro">
	    	<label>Categoria</label>
	        <span class="field">
	        	<select name="data[Establishment][category_id]" id="NewsEmfoco">
					<?php foreach($categories as $key => $category): ?>
						<option value="<?php echo $category['categories']['id']; ?>"><?php echo $category['categories']['name']; ?></option>
					<?php endforeach; ?>
				</select>
			</span>
	    </p>
		<p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>   
	    <?php echo $this->Form->end();?>
	    
	    <br />
	    <br />
	    
	    <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
			<colgroup>
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			
			<thead>
				<tr>
					<th class="head0"><?php echo 'Nome';?></th>
					<th class="head1"><?php echo 'Cidade';?></th>
					<th class="head0"><?php echo 'Categoria';?></th>
					<th class="head1"><?php echo 'Destaque';?></th>

					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<th class="head0"><?php echo 'Nome';?></th>
					<th class="head1"><?php echo 'Cidade';?></th>
					<th class="head0"><?php echo 'Categoria';?></th>
					<th class="head1"><?php echo 'Destaque';?></th>
					<th class="head1"><?php echo __('Ações');?></th>
				</tr>
			</tfoot>
			
			<tbody id="resultado_ajax">
				<tr class="gradeX">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
		<div id="teste_result"></div>
			
	</div>
	
	<script type="text/javascript">
	
		var json = "";
		var html = "";
		jQuery('#pesquisar').submit(function (event) {
		event.preventDefault;
		var form = jQuery(this);
		
		var resultado = jQuery('#resultado_ajax');
		
		var data1 = jQuery(this).serialize(), urlAjax = jQuery(this).attr('action');
		
			jQuery.ajax({
				cache: false,
				type : "post",
				contentType : "application/x-www-form-urlencoded; charset=UTF-8",
				url: urlAjax,
				data: data1,
				success: function(data) {
					
					html = "";
					
					json = eval('(' + data + ')');
					
					if (json.establishments != undefined && json.establishments.length > 0 ) {
						console.log('tem algo no json');
						
						jQuery (json.establishments).each(function() {
							
							var item = jQuery(this);
							
							item = item[0];

							html += "<tr class='gradeX'>";
							html += "<td>";
							html += item.Establishment.name;
							html += "</td>";
							html += "<td>";
							html += item.City.name;
							html += "</td>";
							html += "<td>";
							html += item.Category.name;
							html += "</td>";
							html += "<td>";
							html += item.Establishment.destaque;
							html += "</td>";
							
							html += "<td>";
							html += "<a href='/admin/establishments/edit_destaque/";
							html += item.Establishment.id;
							html += "'>Editar</a>";
							html += "</td>";
							
							html += "</tr>";
						});	
						
						resultado.html(html);
						
					} else {
						resultado.html('<br /><br /><b>Não foram encontrados estabelecimentos nesta categoria</b><br /><br />');
					}
					
			  	},
			  	error: function() {
			  		alert('A consulta demorou mais que o esperado, por favor tente novamente.');
			  	}
			});
		
		return false;
	});
		
		
	</script>
	
	
</div>
