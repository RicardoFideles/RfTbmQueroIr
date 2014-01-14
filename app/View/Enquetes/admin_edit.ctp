<?php echo $this->element('editor/index'); ?>

<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'enquetes', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Enquetes</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Enquete', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('id'); ?>
	    <p class="primeiro">
	    	<label>Nome</label>
	        <span class="field"><?php echo $this->Form->input('name'); ?></span>
	    </p>
	    <p>
	    	<label>Status</label>
	    	<span class="field">
		    	<?php 
	        		echo $this->Form->input('status', array('options' => array('aberta' => 'Aberta','encerrada' => 'Encerrada'), 'empty' => 'Selecione uma opção')); 
				?>
    		</span>
	    </p>
	    <p>
	    	<label>Exibir na home</label>
	        <span class="field">
	        	<?php 
					echo $this->Form->input('destaque', array('options' => array('sim' => 'Sim','nao' => 'Não'), 'empty' => 'Selecione uma opção')); 
        		?>
    		</span>
	    </p>
	     <p>
	    	<label>Texto</label>
	        <span class="field"><?php echo $this->Form->input('texto', array('rows'=>'5', 'cols'=>'55','class'=>'texto', 'maxlength' => '340')); ?></span>
	        <span class="contador texto field">340 caracteres restantes</span>
	    </p>
	    <p>
	    	<label>Opção 1</label>
	        <span class="field"><?php echo $this->Form->input('opcao_1'); ?></span>
	    </p>
	    <p>
	    	<label>Opção 2</label>
	        <span class="field"><?php echo $this->Form->input('opcao_2'); ?></span>
	    </p>
	    <p>
	    	<label>Opção 3</label>
	        <span class="field"><?php echo $this->Form->input('opcao_3'); ?></span>
	    </p>
	    <p>
	    	<label>Opção 4</label>
	        <span class="field"><?php echo $this->Form->input('opcao_4'); ?></span>
	    </p>
	    <p>
	    	<label>Opção 5</label>
	        <span class="field"><?php echo $this->Form->input('opcao_5'); ?></span>
	    </p>
	    
	    
	    <p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>
    <?php echo $this->Form->end();?>
</div>


<script type="text/javascript">
	
	jQuery('.texto').keyup(function() { jQuery('.contador.texto').html(this.value.length + ' de 340 caracteres'); });
	
	
</script>
