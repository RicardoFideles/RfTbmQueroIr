<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/historia', array('controller' => 'pages', 'action' => 'display', 'historia'));
	Router::connect('/entrevista', array('controller' => 'pages', 'action' => 'display', 'entrevista'));
	Router::connect('/sobre', array('controller' => 'pages', 'action' => 'display', 'sobre'));
	Router::connect('/contato', array('controller' => 'pages', 'action' => 'display', 'contato'));
	Router::connect('/busca', array('controller' => 'pages', 'action' => 'display', 'busca'));
	Router::connect('/politica-de-privacidade', array('controller' => 'pages', 'action' => 'display', 'politica-de-privacidade'));
	
	
	#registro de votos
	Router::connect('/votos', array('controller' => 'establishments', 'action' => 'registrar'));
	
	#cadastro de usuários
	Router::connect('/cadastre-se', array('controller' => 'users', 'action' => 'add'));
		
	
	
	#rotas dinâmicas
    Router::connect('/categoria/:slug/:page', array(
        'controller' => 'establishments',
        'action' => 'lista'), array(
            'pass' => array('slug','page'),        
            'slug' => '[a-z\-\.]+',
            'page' => '[0-9]'
            
    ));
	
	#rotas dinâmicas
    Router::connect('/categoria/:slug', array(
        'controller' => 'establishments',
        'action' => 'lista'), array(
            'pass' => array('slug'),        
            'slug' => '[a-z\-\.]+'
            
    ));
	
	
	#rotas dinâmicas
    Router::connect('/materia/:slug', array(
        'controller' => 'news',
        'action' => 'view'), array(
            'pass' => array('slug'),        
            'slug' => '[a-z0-9\-\.]+'
    ));
	
	#rotas dinâmicas
    Router::connect('/estabelecimento/:slug', array(
        'controller' => 'establishments',
        'action' => 'view'), array(
            'pass' => array('slug'),        
            'slug' => '[a-z0-9\-\.]+'
    ));
	
	#rotas dinâmicas
    Router::connect('/historia/:slug', array(
        'controller' => 'people',
        'action' => 'view'), array(
            'pass' => array('slug'),        
            'slug' => '[a-z0-9\-\.]+'
    ));
	
	
	#rotas dinâmicas
    Router::connect('/entrevista/:slug', array(
        'controller' => 'interviews',
        'action' => 'view'), array(
            'pass' => array('slug'),        
            'slug' => '[a-z0-9\-\.]+'
    ));
	
	
	Router::connect('/blogs', array('controller' => 'blogs', 'action' => 'lista'));
	Router::connect('/blogs/:page', array('controller' => 'blogs', 'action' => 'lista'));
	
	Router::connect('/historias', array('controller' => 'people', 'action' => 'lista'));
	Router::connect('/historias/:page', array('controller' => 'people', 'action' => 'lista'));
	
	Router::connect('/materias', array('controller' => 'news', 'action' => 'lista'));
	Router::connect('/materias/:page', array('controller' => 'news', 'action' => 'lista'));
	
	Router::connect('/entrevistas', array('controller' => 'interviews', 'action' => 'lista'));
	Router::connect('/entrevistas/:page', array('controller' => 'interviews', 'action' => 'lista'));
	
	# Rotas do painel de controle
    Router::connect('/admin', array('controller' => 'users', 'action' => 'dashboard', 'admin' => true));
    Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login', 'admin' => true));
    Router::connect('/admin/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true));
	
	
	# Rotas do painel de controle
    Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout', 'guest' => true));
	Router::connect('/painel', array('controller' => 'users', 'action' => 'edit', 'guest' => true));
   
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
