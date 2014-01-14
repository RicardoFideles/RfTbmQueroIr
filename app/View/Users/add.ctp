<!-- CONTATO -->
<div class="row marginTopB marginBottomB">
	<div class="col-md-12 col-sm-12 col-xs-12 InternaAlturaBlog">                    
		<p class="TitulosInternas fonteSiteSouvLight">CADASTRE-SE</p>
		<hr class="hrTitulos" />
	</div>
	
	
	<div class="col-md-12 col-sm-12 col-xs-12 MateriasTituloListagem">
    	<h4 class="textColorB"><?php echo $this->Session->flash() ?></h4>
    	<br><br>
    </div>
    
	<div class="col-md-12 col-sm-12 col-xs-12 MateriasTituloListagem">
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 
													 'role' => 'form',
													 'inputDefaults' => array(
													        'label' => false,
													    ))); ?>
													    

			<div class="form-group">
				<label for="inputNome" class="col-md-2 col-sm-2 col-xs-3 control-label">Nome *</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('name', array ('class' => 'form-control') );
					?>
				</div>
			</div> 

			<div class="form-group">
				<label for="inputSobrenome" class="col-md-2 col-sm-2 col-xs-3 control-label">Sobrenome *</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('surname', array ('class' => 'form-control' , 'id' => 'inputSobrenome') );
					?>
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputCidade" class="col-md-2 col-sm-2 col-xs-3 control-label">Cidade</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('cidade', array ('class' => 'form-control' , 'id' => 'inputCidade') );
					?>
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputEstado" class="col-md-2 col-sm-2 col-xs-3 control-label">Estado</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('estado', array ('class' => 'form-control' , 'id' => 'inputEstado') );
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputBairro" class="col-md-2 col-sm-2 col-xs-3 control-label">Bairro</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('bairro', array ('class' => 'form-control' , 'id' => 'inputBairro') );
					?>
				</div>
			</div>                                  

			<div class="form-group">
				<label for="inputCPF" class="col-md-2 col-sm-2 col-xs-3 control-label">CPF</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('cpf', array ('class' => 'form-control' , 'id' => 'inputCPF') );
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail" class="col-md-2 col-sm-2 col-xs-3 control-label">E-mail *</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('username', array ('class' => 'form-control' , 'id' => 'inputEmail') );
					?>
				</div>
			</div>                                  
  
			<div class="form-group">
				<label for="inputSenha" class="col-md-2 col-sm-2 col-xs-3 control-label">Senha *</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('password', array ('class' => 'form-control' , 'id' => 'inputSenha') );
					?>
 				</div>
			</div>
  
			<div class="form-group">
				<label for="inputConfirmaSenha" class="col-md-2 col-sm-2 col-xs-3 control-label">Confirmar Senha *</label>
				<div class="col-md-5 col-sm-9 col-xs-9">
					<?php 
						echo $this->Form->input('password_confirm', array ('class' => 'form-control' , 'id' => 'inputConfirmaSenha', 'type' => 'password') );
					?>
				</div>
			</div>
  
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 col-xs-offset-3 col-xs-9">
					<button type="submit" class="btn btn-tbqueroirB">Cadastrar</button>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
  <!-- CONTATO -->
  
<?php 
	echo $this->element('estabelecimentos/outros', 
						array(), 
						array("cache" => array('config' => 'short', 'key' => 'outros_historia')
		)); 
?>