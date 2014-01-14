<div class="titulo CorGrena DestaqueBold">
	<?php 
		$erro= $this->Session->flash(); 
		
		if ($erro) {
			echo "Mensagem enviada com sucesso!";
		} else {
			echo "Ocorreu um erro, tente novamente mais tarde.";
		}
	?>
</div>