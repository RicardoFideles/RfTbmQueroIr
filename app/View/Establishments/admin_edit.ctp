<?php echo $this->element('editor/index'); ?>

<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'establishments', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Estabelecimentos</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Establishment', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('id'); ?>
	    <p class="primeiro">
	    	<label>Nome</label>
	        <span class="field"><?php echo $this->Form->input('name'); ?></span>
	    </p>
	    <p>
	    	<label>Categoria</label>
	        <span class="field"><?php echo $this->Form->input('category_id'); ?></span>
	    </p>
	    <p>
	    	<label>Cidade</label>
	        <span class="field"><?php echo $this->Form->input('city_id'); ?></span>
	    </p>
	    
	    <p>
	    	<label>Destaque</label>
	        <span class="field">
	        	<?php 
	        		echo $this->Form->input('destaque', array('options' => array('sim' => 'Sim','nao' => 'Não'), 'default' => 'nao')); 
				?>
			</span>
	    </p>
	    
	     <p>
	    	<label>Site</label>
	        <span class="field"><?php echo $this->Form->input('site'); ?></span>
	    </p>
	    
	     <p>
    		<label>Texto breve</label>
	        <span class="field"><?php echo $this->Form->input('breve', array('class' => 'breve' , 'maxlength' => '140')); ?></span>
        	<span class="contador breve field ">140 caracteres restantes</span>
	    </p>
	    
	    
	     <p>
	    	<label>Texto</label>
	        <span class="field"><?php echo $this->Form->input('texto', array('rows'=>'5', 'cols'=>'15','class'=>'ckeditor2', 'id'=> 'editor2')); ?></span>
	    </p>
	    
	    <p>
    		<label>Informações</label>
	        <span class="field"><?php echo $this->Form->input('informacoes', array('rows'=>'5', 'cols'=>'15','class'=>'ckeditor2', 'id'=> 'editor3')); ?></span>
	    </p>
	    
	    <p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>
    <?php echo $this->Form->end();?>
</div>

<script type="text/javascript">
	
	jQuery('.breve').keyup(function() { jQuery('.breve.subtitulo').html(this.value.length + ' restantes'); });
	
	
</script>
