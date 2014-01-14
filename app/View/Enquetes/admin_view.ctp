<div class="content">
	 <div class="contenttitle">
    	<h2 class="form"><span>Enquete</span></h2>
    </div>
    
     <br />
    <?php echo $this->Form->create('News', array('type' => 'file','id' => 'form2', 'class' => 'stdform stdform2',  'inputDefaults' => array('label' => false, 'div' => false)));?>
    	<?php echo $this->Form->input('empresa', array('type' => 'hidden', 'value' => 'eterny')); ?>
	    <p class="primeiro">
	    	<label>Enquete</label>
	        <span class="field"><?php echo $enquete['Enquete']['name'] ?></span>
	    </p>
	    
	    <p>
	    	<label>Parciais</label>
	        <span class="field"></span>
	    </p>
	    <?php 
	    	$opcao1 = $enquete['Enquete']['opcao_1'];
			if (!empty($opcao1)) {
	    ?>

	    <p>
	    	<label><?php echo $enquete['Enquete']['opcao_1'] ?></label>
	        <span class="field"><?php echo $enquete['Enquete']['resposta_1'] ?></span>
	    </p>
	    
	    <?php
	    	}
	    ?>
	    
	    <?php 
	    	$opcao2 = $enquete['Enquete']['opcao_2'];
			if (!empty($opcao2)) {
	    ?>
	    
	    <p>
	    	<label><?php echo $enquete['Enquete']['opcao_2'] ?></label>
	        <span class="field"><?php echo $enquete['Enquete']['resposta_2'] ?></span>
	    </p>
	    
	    <?php
	    	}
	    ?>
	    
	    <?php 
	    	$opcao3 = $enquete['Enquete']['opcao_3'];
			if (!empty($opcao3)) {
	    ?>
	    
	    <p>
	    	<label><?php echo $enquete['Enquete']['opcao_3'] ?></label>
	        <span class="field"><?php echo $enquete['Enquete']['resposta_3'] ?></span>
	    </p>
	    
	     <?php
	    	}
	    ?>
	    
	     <?php 
	    	$opcao4 = $enquete['Enquete']['opcao_4'];
			if (!empty($opcao4)) {
	    ?>
	    
	    <p>
	    	<label><?php echo $enquete['Enquete']['opcao_4'] ?></label>
	        <span class="field"><?php echo $enquete['Enquete']['resposta_4'] ?></span>
	    </p>
	    
	    <?php
	    	}
	    ?>
	    
	    <?php 
	    	$opcao5 = $enquete['Enquete']['opcao_5'];
			if (!empty($opcao5)) {
	    ?>
	    
	    <p>
	    	<label><?php echo $enquete['Enquete']['opcao_5'] ?></label>
	        <span class="field"><?php echo $enquete['Enquete']['resposta_5'] ?></span>
	    </p>
	    
	     <?php
	    	}
	    ?>
	    
    <?php echo $this->Form->end();?>
</div>
    
<br clear="all" /><br />

