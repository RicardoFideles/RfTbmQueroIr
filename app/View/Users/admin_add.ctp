<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'users', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Usuários</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('User', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
	    <p class="primeiro">
	    	<label>Nome</label>
	        <span class="field"><?php echo $this->Form->input('name'); ?></span>
	    </p>
	    <p>
	    	<label>Login</label>
	        <span class="field"><?php echo $this->Form->input('username'); ?></span>
	    </p>
	    <p>
	    	<label>Senha</label>
	        <span class="field"><?php echo $this->Form->input('password'); ?></span>
	    </p>
	    <p>
	    	<label>Confirmar Senha</label>
	        <span class="field"><?php echo $this->Form->input('password_confirm'); ?></span>
	    </p>
	    
	    <p>
	    	<label>Permissão</label>
	        <span class="field">
	        	<?php 
	        		echo $this->Form->input('role', array('options' => array('admin' => 'Admin','guest' => 'Guest'))); 
				?>
			</span>
	    </p>
	    
	    
	    <p>
	    	<label>Email</label>
	        <span class="field"><?php echo $this->Form->input('email'); ?></span>
	    </p>
	    
	     
	    
	    <p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>
    <?php echo $this->Form->end();?>
</div>
