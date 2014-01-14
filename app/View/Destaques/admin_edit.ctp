<div class="content">
	<ul class="buttonlist">
		<li>
			<li><a href="<?php
				$link = array('controller' => 'destaques', 'action' => 'index');
				echo $this->Html->url($link); ?>" class="btn btn_book"><span>Voltar</span></a></li>
		</li>
	</ul>
	 <div class="contenttitle">
    	<h2 class="form"><span>Matérias em Destaque</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('Destaque', array('id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('id'); ?>
	    <p class="primeiro">
	    	<label>Destaque Principal</label>
	        <span class="field">
	        	<select name="data[Destaque][posicao_1]" id="DestaqueNewsId">
					<?php foreach($news as $key => $news): ?>
						
						<option value="<?php echo $key ?>"><?php echo $news ?></option>
					<?php endforeach; ?>
				</select>
        	</span>
	    </p>
	    <p>
	    	<label>Noticia em destaque</label>
	        <span class="field"><?php echo $this->Form->input('news_id'); ?></span>
	    </p>
	    <p>
	    	<label>Minha História em destaque</label>
	        <span class="field"><?php echo $this->Form->input('person_id'); ?></span>
	    </p>
	    <p>
	    	<label>Entrevista em destaque</label>
	        <span class="field"><?php echo $this->Form->input('interview_id'); ?></span>
	    </p>
	    <p class="stdformbutton">
            <button class="submit radius2">Enviar</button>
        </p>
    <?php echo $this->Form->end();?>
</div>

