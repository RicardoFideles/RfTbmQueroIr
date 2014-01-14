<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'settings', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Configurações do Sistema</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Setting', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('id'); ?>
	    <p class="primeiro">
	    	<label>Email</label>
	        <span class="field"><?php echo $this->Form->input('email'); ?></span>
	    </p>
	    <p>
	    	<label>Link Facebook</label>
	        <span class="field"><?php echo $this->Form->input('link_facebook'); ?></span>
	    </p>
	    <p>
	    	<label>Link Twitter</label>
	        <span class="field"><?php echo $this->Form->input('link_twitter'); ?></span>
	    </p>
	    
	    <p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>
    <?php echo $this->Form->end();?>
</div>
