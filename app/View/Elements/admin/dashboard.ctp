<?php
	$cidades = $this->requestAction(array('controller' => 'Cities', 'action' => 'cidades', 'admin' => false));
?>

<div class="mainleft">
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
            		<ul>
                    	<li class="current"><a href="#" class="dashboard"><span>Painel</span></a></li>
                    	
                    	<li>
                        	<a href="<?php 
                        					$link = array('controller' => 'users', 'action' => 'index');
                        					echo $this->Html->url($link);
                        			?>" 
                    			class="tables"><span>Administradores do Site</span>
                			</a>
                        </li>
                        <li>
                        	<a href="<?php 
                        					$link = array('controller' => 'users', 'action' => 'guest');
                        					echo $this->Html->url($link);
                        			?>" 
                    			class="tables"><span>Usuários Cadastrados</span>
                			</a>
                        </li>
                        
                    	<li >
                        	<a href="#" 
                			 class="widgets menudrop"><span>Site</span></a>
                			 <ul>
            			 		<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'cities', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Cidades</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'settings', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Configurações do Sistema</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'categories', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Categorias</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'paginas', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Páginas Estáticas</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'news', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Matérias</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'interviews', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Entrevistas</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'people', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Minha História</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'blogs', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Blogs</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'establishments', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Estabelecimentos</span>
		                			</a>
        						</li>
        						<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'enquetes', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="tables"><span>Enquetes</span>
		                			</a>
        						</li>
                			 </ul>
            			 </li>
                        
                        <li>
                        	<a href="<?php 
                        					$link = array('controller' => 'comments', 'action' => 'index');
                        					echo $this->Html->url($link);
                        			?>" 
                    			class="tables"><span>Comentários</span>
                			</a>
                        </li>
                        <li >
                        	<a href="#" 
                			 class="widgets menudrop"><span>Destaques na Home</span></a>
                			 <ul>
								<li>
		                        	<a href="<?php 
		                        					$link = array('controller' => 'destaques', 'action' => 'index');
		                        					echo $this->Html->url($link);
		                        			?>" 
		                    			class="btn btn_book"><span>Reportagens em Destaque</span>
		                			</a>
		                        </li>
        			 			<?php foreach($cidades as $key => $cidade): ?>
									<?php $id_cidade = $cidade['City']['id']; ?>
									<li>
										<a href="<?php $link = array('controller' => 'establishments', 'action' => 'lista', $id_cidade);echo $this->Html->url($link); ?>" class="btn btn_book">
											<span><?php echo $cidade['City']['name']; ?></span>
										</a>
									</li>
								<?php endforeach; ?>
    			 			</ul>
			 			</li>
                        
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->