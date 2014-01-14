<?php 
	echo $this->element('editor/index'); 
	$pagina = $this->request->data['Pagina'];
?>

<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'paginas', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Páginas Estáticas</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Pagina', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('id'); ?>
    	<?php echo $this->Form->input('name', array('type' => 'hidden')); ?>
	    <p class="primeiro">
	    	<label>Pagina</label>
	        <span class="field">
	        	<?php echo $pagina['name'] ?>
        	</span>
	    </p>
	    <p>
	    	<label>Texto</label>
	        <span class="field"><?php echo $this->Form->input('texto', array('rows'=>'5', 'cols'=>'15','class'=>'ckeditor2', 'id'=> 'editor2')); ?></span>
	    </p>
	    <p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>
    <?php echo $this->Form->end();?>
</div>
