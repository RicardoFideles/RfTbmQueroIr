<?php
	$cidades = $this->requestAction(array('controller' => 'Cities', 'action' => 'cidades'));
	
	$cidadeSelecionada =  Configure::read('Config.cidadeSelecionada');
	
	$cidadeSelecionada = $cidadeSelecionada;
	

?>

<!-- HEADER  -->
<div class="rowFixHorizScroll bkgA faixaTopo_e_Rodape hidden-print">
	<div class="container">
		<div class="row textColorA">
			<!-- lg md sm  -->
			<div class="col-md-6 col-sm-6 hidden-xs">&nbsp;&nbsp;SUA CIDADE: 
				<div class="btn-group">
                    <button class="btn btn-tbqueroirB btn-xs dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $cidadeSelecionada['City']['name']; ?> <span class="caret setaBranca-caret"></span></button>
					<ul class="dropdown-menu tbqueroirB">
						<?php foreach($cidades as $key => $cidade): ?>
							<li>
								<?php
									$nome = $cidade['City']['name'];
									$id = $cidade['City']['id'];
									echo $this->Html->link($nome, array('controller'=>'Cities','action' => 'setCidade', $id));
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			
			<div class="col-md-6 col-sm-6 text-right hidden-xs"> 
				<ul class="nav nav-pills">
					<li class="dropdown">
						
						<?php 
							$nome = AuthComponent::user('name');
							if (isset($nome)) {
						?>
							
						<button class="btn btn-tbqueroirA btn-xs" type="button">
							
						<a href="<?php echo $this->Html->url('/painel') ?>"><?php echo $nome; ?></a>
						
						</button>
						
						<?php
							} else {
								
						?>
						
						<button class="btn btn-tbqueroirA btn-xs dropdown-toggle" type="button" data-toggle="dropdown">LOGIN <span class="caret setaVerde-caret"></span></button>
						<div class="dropdown-menu pull-left">
							<?php echo $this->Form->create('User', array('action' => 'login', 'id'=> 'login', 'class' => 'form-horizontal formMargin', 'role' => 'form','inputDefaults' => array('div' => false, 'label' => false))) ?>

								<br />
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
								        <?php echo $this->Form->input('username', array('id' => 'inputEmail3', 'class' => 'form-control','type' => 'text', 'placeholder' => 'Email')) ?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
								        <?php echo $this->Form->input('password', array('type'=> 'password' ,'id' => 'inputPassword3', 'class' => 'form-control','placeholder' => 'Senha')) ?>

									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
										<div class="checkbox textColorB"><label><input type="checkbox"> Lembrar senha</label></div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10 text-left"><a href="#" class="EsqueceuSenha">Esqueceu a senha?</a></div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10 text-left"><button type="submit" class="btn btn-tbqueroirB btn-xs">Acessar</button></div>
								</div>
							</form>
						</div>
						
						<?php
								
							}
						?>
						
						
						
					</li>
					<li>
						
						
						<button class="btn btn-tbqueroirA btn-xs" type="button">
							<?php
								$nome = AuthComponent::user('name');
								if (isset($nome)){
									echo $this->Form->postLink(__('SAIR'), array('controller' => 'users', 'action' => 'logout'));
									
								} else {
							?>
								<a href="<?php echo $this->Html->url('/cadastre-se'); ?>" class="btn-tbqueroirA"> CADASTRE-SE </a> 
							<?php
								}
							?>
						</button>
					</li>
					
					<script>
						$('.btn.btn-tbqueroirA.btn-xs a').addClass('btn-tbqueroirA');
					</script>
				</ul>
			</div>
			<!-- lg md sm  -->


			<!-- xs  -->
			<div class="col-md-6 col-sm-6 col-xs-12 text-center visible-xs">&nbsp;&nbsp;SUA CIDADE: 
				<div class="btn-group">
					<button class="btn btn-tbqueroirB btn-xs dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $cidadeSelecionada['City']['name']; ?> <span class="caret setaBranca-caret"></span></button>
					<ul class="dropdown-menu tbqueroirB">
						<?php foreach($cidades as $key => $cidade): ?>
							<li>
								<?php
									$nome = $cidade['City']['name'];
									$id = $cidade['City']['id'];
									echo $this->Html->link($nome, array('controller'=>'Cities','action' => 'setCidade', $id));
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12 text-center visible-xs">
				<ul class="nav nav-pills">
					<li class="dropdown">
						
						<?php 
							$nome = AuthComponent::user('name');
							if (isset($nome)) {
						?>
							
						<button class="btn btn-tbqueroirA btn-xs" type="button">
							
						<a href="<?php echo $this->Html->url('/painel') ?>"><?php echo $nome; ?></a>
						
						</button>
						
						<?php
							} else {
								
						?>
						<button class="btn btn-tbqueroirA btn-xs dropdown-toggle" type="button" data-toggle="dropdown">LOGIN <span class="caret setaVerde-caret"></span></button>
						<div class="dropdown-menu pull-left">

							<?php echo $this->Form->create('User', array('action' => 'login', 'id'=> 'login', 'class' => 'form-horizontal formMargin', 'role' => 'form','inputDefaults' => array('div' => false, 'label' => false))) ?>
							
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
								        <?php echo $this->Form->input('username', array('id' => 'inputEmail3', 'class' => 'form-control','type' => 'text', 'placeholder' => 'Email')) ?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
								        <?php echo $this->Form->input('password', array('type'=> 'password' ,'id' => 'inputPassword3', 'class' => 'form-control','placeholder' => 'Senha')) ?>

									</div>
								</div>
								<div class="form-group">
								
								<div class="form-group">
									<div class="col-sm-offset-1  col-sm-10"><div class="checkbox textColorB"><label><input type="checkbox"> Lembrar senha</label></div></div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10 text-left"><a href="#" class="EsqueceuSenha">Esqueceu a senha?</a></div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-1  col-sm-10"><button type="submit" class="btn btn-tbqueroirB btn-xs">Acessar</button></div>
								</div>
							</form>
						</div>
						<?php 
						}
						?>
					</li>
					<li>
						<button class="btn btn-tbqueroirA btn-xs" href="<?php echo $this->Html->url('/cadastre-se'); ?>" type="button" class="btn-tbqueroirA">
							<?php
								$nome = AuthComponent::user('name');
								if (isset($nome)){
									echo $this->Form->postLink(__('SAIR'), array('controller' => 'users', 'action' => 'logout'));
									
								} else {
							?>
								<a href="<?php echo $this->Html->url('/cadastre-se'); ?>" class="btn-tbqueroirA"> CADASTRE-SE </a> 
							<?php
								}
							?>
						</button>
					</li>
					
					<script>
						$('.btn.btn-tbqueroirA a').addClass('btn-tbqueroirA');
					</script>	
				</ul>
			</div>
			<!-- xs  -->
		</div>
	</div>
</div>
<!-- HEADER  -->