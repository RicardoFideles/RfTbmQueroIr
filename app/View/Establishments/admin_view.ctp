<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'establishments', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span><?php echo $establishment['Establishment']['name'] ?></span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Interview', array('type' => 'file','id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
	    <p class="primeiro">
	    	<label>Nome</label>
	        <span class="field"><?php echo $establishment['Establishment']['name'] ?></span>
	    </p>
	    <p>
	    	<label>Categoria</label>
	        <span class="field"><?php echo $establishment['Category']['name'] ?></span>
	    </p>
	    <p>
	    	<label>Cidade</label>
	        <span class="field"><?php echo $establishment['City']['name'] ?></span>
	    </p>
    <?php echo $this->Form->end();?>
</div>
    
<br clear="all" /><br />
<div class="content">

	<ul class="buttonlist">
		<li>
			<a href="<?php $link = array('controller' => 'Photos', 'action' => 'add_estabelecimento',$establishment['Establishment']['id']); echo $this->Html->url($link); ?>" class="btn btn_book">
				<span>Adicionar imagens</span>
			</a>
		</li>
	</ul>
	<div class="contenttitle">
		<h2 class="image"><span>Fotos Relacionadas</span></h2>
	</div>

	<br />

	<ul class="imagelist">
		<?php foreach ($establishment['Photo'] as $foto): ?>
			<li>
				<?php $url = $this->Link->makeLinkImgDir('small', $foto['imagem'], 'fotos'); ?>
				<img src="<?php echo $this->Html->url($url); ?>" alt="" style="opacity: 1;">
				<span>
					<a href="ajax/edit_photo.html" class="name ajax cboxElement"><?php echo $foto['imagem'] ?></a>
					<?php $url_edit = array('controller' => 'Photos', 'action' => 'edit_estabelecimento', $foto['id'],$establishment['Establishment']['id']); ?>
					<a href="<?php echo $this->html->url($url_edit) ;?>" class="edit ajax cboxElement"></a>
					<?php $url_delete = array('controller' => 'Photos', 'action' => 'delete_estabelecimento', $foto['id'],$establishment['Establishment']['id']); ?>
					<a class="delete" href="<?php echo $this->html->url($url_delete) ;?>"></a>
				</span>
			</li>
		<?php endforeach; ?>    	
	</ul>
<br clear="all" /><br />
</div>	

<br clear="all" /><br />

