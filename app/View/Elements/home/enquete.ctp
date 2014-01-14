<?php
	$enquete = $this->requestAction(array('controller' => 'enquetes', 'action' => 'enqueteCapa'));
?>

<?php 
	if ($enquete!= null && !empty($enquete)) {
?>

<?php 
	if ($enquete['Enquete']['status'] == 'encerrada') {
			
		echo $this->element('home/enquete_fechada');		
		
	} else{
?>

<div class="col-md-3 col-sm-12 col-xs-12 HomeAltMinA">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<?php 
				 echo $this->Form->create(null, array('url' => array('controller' => 'enquetes', 'action' => 'edit'), 'id' => 'enqueteForm')); 
			?>
			
				<input name="data[Enquete][id]" value="<?php echo $enquete['Enquete']['id']; ?>" type="hidden" />
				<p class="fonteSiteSouvMedium EnqueteTitulo textColorC">ENQUETE</p>
				<p>
					<?php echo $enquete['Enquete']['texto']; ?>
				</p>
				<label>
					<?php
						$opcao1 = $enquete['Enquete']['opcao_1'];
						if (!empty($opcao1)) {
					?>
						<p class="EnqueteTextWeight">
							<input type="radio" name="data[Enquete][resposta_1]" id="resposta_1">
							<?php echo $opcao1; ?>
						</p>
					<?php
						} 
					?>
					<?php
						$opcao2 = $enquete['Enquete']['opcao_2'];
						if (!empty($opcao2)) {
					?>
						<p class="EnqueteTextWeight">
							<input type="radio" name="data[Enquete][resposta_2]" id="resposta_2">
							<?php echo $opcao2; ?>
						</p>
					<?php
						} 
					?>
					<?php
						$opcao3 = $enquete['Enquete']['opcao_3'];
						if (!empty($opcao3)) {
					?>
						<p class="EnqueteTextWeight">
							<input type="radio" name="data[Enquete][resposta_3]" id="resposta_3">
							<?php echo $opcao3; ?>
						</p>
					<?php
						} 
					?>
					<?php
						$opcao4 = $enquete['Enquete']['opcao_4'];
						if (!empty($opcao4)) {
					?>
						<p class="EnqueteTextWeight">
							<input type="radio" name="data[Enquete][resposta_4]" id="resposta_4">
							<?php echo $opcao4; ?>
						</p>
					<?php
						} 
					?>
					<?php
						$opcao5 = $enquete['Enquete']['opcao_5'];
						if (!empty($opcao5)) {
					?>
						<p class="EnqueteTextWeight">
							<input type="radio" name="data[Enquete][resposta_5]" id="resposta_5">
							<?php echo $opcao5; ?>
						</p>
					<?php
						} 
					?>
					
					
				</label>
				<br>
				<p><button type="submit" class="btn btn-default btn-tbqueroirE">Enviar</button></p>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>

<?php
	}
?>


<?php
	}
?>