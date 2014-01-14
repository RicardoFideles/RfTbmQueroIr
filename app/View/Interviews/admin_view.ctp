<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'interviews', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Entrevistas</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Interview', array('type' => 'file','id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
	    <p class="primeiro">
	    	<label>Título</label>
	        <span class="field"><?php echo $interview['Interview']['name'] ?></span>
	    </p>
	    <p>
	    	<label>Subtítulo</label>
	        <span class="field"><?php echo $interview['Interview']['subtitulo'] ?></span>
	    </p>
    <?php echo $this->Form->end();?>
</div>
    
<br clear="all" /><br />
<div class="content">
	
	<?php 
		if (sizeof($interview['Photo']) <= 0) {
	?>
		<ul class="buttonlist">
			<li>
				<a href="<?php $link = array('controller' => 'Photos', 'action' => 'add_entrevista',$interview['Interview']['id']); echo $this->Html->url($link); ?>" class="btn btn_book">
					<span>Adicionar imagens</span>
				</a>
			</li>
		</ul>
	
	<?php
		}
	?>
	<div class="contenttitle">
		<h2 class="image"><span>Fotos Relacionadas</span></h2>
	</div>

	<br />

	<ul class="imagelist">
		<?php foreach ($interview['Photo'] as $foto): ?>
			<li>
				<?php $url = $this->Link->makeLinkImgDir('small', $foto['imagem'], 'fotos'); ?>
				<img src="<?php echo $this->Html->url($url); ?>" alt="" style="opacity: 1;">
				<span>
					<a href="ajax/edit_photo.html" class="name ajax cboxElement"><?php echo $foto['imagem'] ?></a>
					<?php $url_edit = array('controller' => 'Photos', 'action' => 'edit_entrevista', $foto['id'],$interview['Interview']['id']); ?>
					<a href="<?php echo $this->html->url($url_edit) ;?>" class="edit ajax cboxElement"></a>
					<?php $url_delete = array('controller' => 'Photos', 'action' => 'delete_entrevista', $foto['id'],$interview['Interview']['id']); ?>
					<a class="delete" href="<?php echo $this->html->url($url_delete) ;?>"></a>
				</span>
			</li>
		<?php endforeach; ?>    	
	</ul>
<br clear="all" /><br />
</div>	

<br clear="all" /><br />

