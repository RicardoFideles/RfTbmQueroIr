<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
 
class ContatosController extends AppController {

  public $uses = array(); // Não utiliza nenhum model

  public function enviar() {

    	$this->set('data', $this->request->data);
    
          
        $nome = $this->request->data['name'];
        $email = $this->request->data['email'];
        $mensagem = $this->request->data['mensagem'];
        $assunto = $this->request->data['assunto'];
       
        $mensagem = '<html>
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>mensagem</title>
          </head>
          <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
      
	      nome : '.$nome.'
	      <br />
	      <br />
	      
	      Email : '.$email.'
	      <br />
	      <br />
	      
	      Assunto : '.$assunto.'
	      <br />
	      <br />
	      
	      Mensagem : '.$mensagem.'
	      <br />
	      <br />
	      
          </body>
          </html>';
    
       
	   	$settings =  Configure::read('Config.settings');
		
		$emailsender = $settings['Setting']['email'];
				
		if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
		elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n";
		
		if(strlen($email) > 0) {
			$emailremetente = $email;
		} else {
			$emailremetente = $emailsender;
		}
		
		$nomeremetente = "Contato do site Também Quero ir";
		$emaildestinatario = $emailsender;
		
		$assunto = "Contato do site - Também Quero ir";
		$mensagemHTML = $mensagem;
		
		$headers = "MIME-Version: 1.1".$quebra_linha;
		$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
		$headers .= "From: ".$emailsender.$quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
		mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
    
    
    	$zica = "false";
    
    	$this->Session->setFlash(__($zica));
  }
  
	public function email ()  {
			
		
		$emailsender = "webmaster@colegioqi.com.br";
				
		if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
		elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n";
		
		$nomeremetente = "Contato do site Colégio Qi";
		$emailremetente = "comunicacao@colegioqi.com.br";
		$emaildestinatario = "comunicacao@colegioqi.com.br";
		//$comcopiaoculta    = "ricardo@ricardofideles.com.br";
		$assunto = "Testando envio de email";
		$mensagem = "Corpo do texto";
		$mensagemHTML = '<P>Aqui est&aacute; a mensagem postada por voc&ecirc; formatada em HTML:</P>
						<p><b><i>'.$mensagem.'</i></b></p>
						<hr>';
		$headers = "MIME-Version: 1.1".$quebra_linha;
		$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
		$headers .= "From: ".$emailsender.$quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
	//	$headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
		mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
		
		
		
	}
	
		
  
  
  

 
}