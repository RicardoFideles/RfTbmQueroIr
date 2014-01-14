<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Session', 'RequestHandler', 'Auth', 'DebugKit.Toolbar');
    
    /**
     * Helpers da aplicação
     * 
     * @var array
     */
    public $helpers = array('Html', 'Form', 'Session', 'Time', 'Text', 'Number','Cache', 'Link', 'RenderBody');
	
	    var $uses = array('Setting','City');
	
    
    /**
     * Verifica se está dentro de um prefixo
     *
     * @param string $prefix
     *
     * @return boolean
     */
    protected function isPrefix($prefix) {
        return isset($this->request->params['prefix']) &&
               $this->request->params['prefix'] === $prefix;
    }
	
         
    
    /**
     * Antes de filtrar as actions da aplicação
     * 
     * Troca o layout do admin 
     */
    public function beforeFilter() {
        
        $this->Auth->authError = 'Área restrita';
        $this->Auth->authorize = array('Controller');       
        $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display', 'home', 'admin' => false);

        $this->Auth->flash = array_merge($this->Auth->flash, array(
            'element' => 'admin/alerts/inline',
            'params' => array('class' => 'error')
        ));
		
        // Painel de Controle
        if ($this->isPrefix('admin')) {
            $this->layout = 'admin';

            // Configuração do AuthComponent
            $this->Auth->authenticate = array('Form' => array(
                'fields' => array('username' => 'username')
            ));


        // Painel do Candidato
        } else {
        	
			
			if (isset($this->request->params['guest']) && $this->request->params['guest']) {
				 $this->Auth->authenticate = array('Form' => array(
	                'fields' => array('username' => 'username')
	            ));
				
			} else {
	            $this->Auth->allow();
			}
	        	
        }
		
		$cidade = $this->City->findAllById(1);
		$cidade = $cidade[0];
        Configure::write('Config.cidadeSelecionada', $cidade);
		
		if ($this->Session->check('Config.cidadeSelecionada')) {
            Configure::write('Config.cidadeSelecionada', $this->Session->read('Config.cidadeSelecionada'));
        }

        return parent::beforeFilter();  
    }
    
    
    
    public function beforeRender() {
        parent::beforeRender();
                
                $language = "pt";
        $language_class = "languague_class_pt";
                $this->set(array(
            'isPainelAdmin' => $this->isPrefix('admin')
        ));
    }  
    
    /**
     * Define se um usuário pode acessar uma página
     * 
     * @param array $user
     */
    public function isAuthorized($user = null) {
        // Any registered user can access public functions
        if (empty($this->request->params['admin'])) {
            return true;
        }

        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            return (bool)($user['role'] === 'admin');
        }

        // Default deny
        return false;
    }
}
