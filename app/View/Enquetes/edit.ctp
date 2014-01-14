<?php
	
	$opcao_1 = $enquete['Enquete']['opcao_1'];
	$opcao_2 = $enquete['Enquete']['opcao_2'];
	$opcao_3 = $enquete['Enquete']['opcao_3'];
	$opcao_4 = $enquete['Enquete']['opcao_4'];
	$opcao_5 = $enquete['Enquete']['opcao_5'];
	
	$resultado_1 = $enquete['Enquete']['resposta_1'];
	$resultado_2 = $enquete['Enquete']['resposta_2'];
	$resultado_3 = $enquete['Enquete']['resposta_3'];
	$resultado_4 = $enquete['Enquete']['resposta_4'];
	$resultado_5 = $enquete['Enquete']['resposta_5'];
	
	$total = 0;
	$total += $resultado_1;
	$total += $resultado_2;
	$total += $resultado_3;
	$total += $resultado_4;
	$total += $resultado_5;
	
	$contador = 0;
	
	
	
	if (!empty($opcao_1)) {
		$contador += 1;
	}
	
	if (!empty($opcao_2)) {
		$contador += 1;
	}
	
	if (!empty($opcao_3)) {
		$contador += 1;
	}
	
	if (!empty($opcao_1)) {
		$contador += 1;
	}
	
	if (!empty($opcao_1)) {
		$contador += 1; 
	}
	
?>



<?php 

	if (!empty($opcao_1)) {
?>

<?php echo $opcao_1; ?>
<?php  $resultado = (100 * $resultado_1) / $total; ?>

<div class="progress progress-bar-success">
	<div class="bar" style="width: <?php echo $resultado; ?>%"></div>
	<div class="vote"><?php echo round($resultado); ?>%</div>
</div>

<?php
	} 
?>

<?php 
	if (!empty($opcao_2)) {
?>

<?php echo $opcao_2; ?>
<?php $resultado = (100 * $resultado_2) / $total; ?>

<div class="progress progress-bar-success">
	<div class="bar" style="width: <?php echo $resultado; ?>%"></div>
	<div class="vote"><?php echo round($resultado); ?>%</div>
</div>

<?php
	} 
?>
<?php 
	if (!empty($opcao_3)) {
?>

<?php echo $opcao_3; ?>
<?php $resultado = (100 * $resultado_3) / $total; ?>

<div class="progress progress-bar-success">
	<div class="bar" style="width: <?php echo $resultado; ?>%"></div>
	<div class="vote"><?php echo round($resultado); ?>%</div>
</div>


<?php
	} 
?>
<?php 
	if (!empty($opcao_4)) {
?>

<?php echo $opcao_4; ?>
<?php  $resultado = (100 * $resultado_4) / $total; ?>

<div class="progress progress-bar-success">
	<div class="bar" style="width: <?php echo $resultado; ?>%"></div>
	<div class="vote"><?php echo round($resultado); ?>%</div>
</div>

<?php
	} 
?>
<?php 
	if (!empty($opcao_5)) {
?>

<?php echo $opcao_5; ?>
<?php $resultado = (100 * $resultado_5) / $total; ?>

<div class="progress progress-bar-success">
	<div class="bar" style="width: <?php echo $resultado; ?>%"></div>
	<div class="vote"><?php echo round($resultado); ?>%</div>
</div>

<?php
	} 
?>

<div class="votes total">
	Total <?php echo $total; ?> voto(s)</div>

</style>