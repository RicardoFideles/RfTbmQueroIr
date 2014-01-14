<?php echo $this->element('editor/index'); ?>

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
	    <p class="primeiro">
	    	<label>Nome</label>
	        <span class="field"><?php echo $this->Form->input('name'); ?></span>
	    </p>
	    <p>
	    	<label>Tipo</label>
	        <span class="field">
	        	<?php 
	        		echo $this->Form->input('tipo', 
						array(
            				'options' => array('historia' => 'História', 
            								   'sobre' => 'Sobre', 
            								   'politica-de-privacidade' => 'Política de Privacidade',
            								   'sobre_fotter' => 'Sobre no rodapé',
            								   'contato' => 'contato',
               								   'minha-historia' => 'Minha História'
											   )
        				)
					); 
				?>
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
