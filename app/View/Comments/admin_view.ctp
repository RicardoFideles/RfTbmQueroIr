<div class="content">
	<ul class="buttonlist">
		<li>
			<li>
				<a href="<?php 
								$link = array('controller' => 'comments', 'action' => 'index');
								echo $this->Html->url($link); ?>" class="btn btn_book">
						<span>Voltar a lista</span>
				</a>
			</li>
			<li>
				<form action="/admin/comments/aprove/23" name="post_52b4d85640e77885708940" id="post_52b4d85640e77885708940" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
				<a href="#" class="btn btn_book" onclick="if (confirm('Você tem certeza que deseja aprovar # 23?')) { document.post_52b4d85640e77885708940.submit(); } event.returnValue = false; return false;"><span>Aprovar</span></a>
			</li>
			<li>
				<form action="/admin/comments/delete/23" name="post_52b4d8c654e36802471680" id="post_52b4d8c654e36802471680" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
				<a href="#" class="btn btn_book" onclick="if (confirm('Você tem certeza que deseja rejeitar # 23?')) { document.post_52b4d8c654e36802471680.submit(); } event.returnValue = false; return false;" style="background-color: rgb(247, 247, 247);"><span>Rejeitar</span></a>
			</li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Comentário : <?php echo $comment['Comment']['id'] ?></span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('News', array('type' => 'file','id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('empresa', array('type' => 'hidden', 'value' => 'eterny')); ?>
	    <p class="primeiro">
	    	<label>Autor</label>
	        <span class="field"><?php echo $comment['User']['name'] ?></span>
	    </p>
	    <p>
	    	<label>Estabelecimento Comentado</label>
	        <span class="field"><?php echo $comment['Establishment']['name'] ?></span>
	    </p>
	    <p>
	    	<label>Status do comentário</label>
	        <span class="field"><?php echo $comment['Comment']['status'] ?></span>
	    </p>
	    
    <?php echo $this->Form->end();?>
</div>
    

<div class="content">
	<?php echo$comment['Comment']['texto'] ?></span>
</div>

<br clear="all" /><br />

