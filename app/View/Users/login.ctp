<?php echo $this->Session->flash() ?>

<!-- MATERIA ABERTA -->
<div class="row marginTopB marginBottomB">

	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">SUA CONTA</p>
		<hr class="hrTitulos" />
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12 MateriasTituloListagem">
    	<h4 class="textColorB"><?php echo $this->Session->flash() ?></h4>
    </div>

	<div class="col-md-9 col-sm-9 col-xs-12 MateriasTituloListagem">
		<p class="MateriasOutrasTituloCol fonteSiteSouvMedium textColorC">SEUS DADOS</p>
		<hr />
		
		<?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login',
													'class' => 'form-horizontal', 
													 'role' => 'form',
													 'inputDefaults' => array(
													        'label' => false,
													    ))); ?>
													    

			
			<div class="form-group">
				<label for="inputEmail" class="col-md-3 col-sm-3 col-xs-12 control-label">E-mail *</label>
				<div class="col-md-7 col-sm-8 col-xs-12">
					<?php 
						echo $this->Form->input('username', array ('class' => 'form-control' , 'id' => 'inputEmail') );
					?>
				</div>
			</div>                                  
  
			<div class="form-group">
				<label for="inputSenha" class="col-md-3 col-sm-3 col-xs-12 control-label">Senha *</label>
				<div class="col-md-7 col-sm-8 col-xs-12">
					<?php 
						echo $this->Form->input('password', array ('class' => 'form-control' , 'id' => 'inputSenha') );
					?>
 				</div>
			</div>
  
			
  
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 col-xs-offset-3 col-xs-9">
					<button type="submit" class="btn btn-tbqueroirB">Entrar</button>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>


</div>









</div>
  <!-- MATERIA ABERTA -->

