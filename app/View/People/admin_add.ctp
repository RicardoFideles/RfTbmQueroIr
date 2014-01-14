<?php echo $this->element('editor/index'); ?>

<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'people', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Minha História</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Person', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
	    <p class="primeiro">
	    	<label>Título</label>
	        <span class="field"><?php echo $this->Form->input('name', array('class' => 'titulo float', 'maxlength' => '140')); ?></span>
	        <span class="contador titulo field">140 caracteres restantes</span>
	    </p>
	    <p>
	    	<label>Subtítulo</label>
	        <span class="field"><?php echo $this->Form->input('subtitulo', array('class' => 'subtitulo float', 'maxlength' => '140')); ?></span>
        	<span class="contador subtitulo field">140 caracteres restantes</span>
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

<script type="text/javascript">
	
	jQuery('.subtitulo').keyup(function() { jQuery('.contador.subtitulo').html(this.value.length + ' de 140 caracteres'); });
	jQuery('.titulo').keyup(function() { jQuery('.contador.titulo').html(this.value.length + ' de 140 caracteres'); });
	
	
</script>
