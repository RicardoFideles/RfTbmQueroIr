<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
/**
     * Login do admin
     */
    public function admin_login() {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->write($this->Auth->sessionKey, $this->Auth->user());

                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Dados incorretos', 'admin/alerts/inline', array('class' => 'error'), 'auth');
            }
        }

        $this->set(array(
            'title_for_layout' => 'Painel de Controle'
        ));
    }
	
	public function login() {

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->write($this->Auth->sessionKey, $this->Auth->user());

                return $this->redirect('/');
            } else {
                $this->Session->setFlash('Dados incorretos');
            }
        }

    }
	
	public function painel () {
		
	}
	
	public function add() {
        $this->layout = 'default';
		
		if ($this->request->is('post')) {
			$this->request->data['User']['role'] = 'guest';
			
			$data = $this->request->data;
			
            $this->User->create();
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('Cadastro completo.'));
				
				$this->request->data['User'] = array_merge(
		            $this->request->data['User'],
		            array('id' => $id)
		        );
				
		        $this->Auth->login($this->request->data['User']);
		        return $this->redirect('/');
				
				
            } else {
                $this->Session->setFlash(__('Ocorreu um erro, por favor verifique os dados e tente novamente.'));
            }
        }

   }
    
    
    /**
     * Logout de usuários (admin)
     */
    public function admin_logout() {
        $this->Session->delete($this->Auth->sessionKey);

        $this->redirect($this->Auth->logout());
    }
	
	public function logout() {
        $this->Session->delete($this->Auth->sessionKey);

        $this->redirect($this->Auth->logout());
    }
    

/**
 * index method
 *
 * @return void
 */
    public function admin_index() {
        $this->User->recursive = 0;
		$this->paginate = array('conditions' => array('User.role' => 'admin') , 'order' => array('User.id' => 'desc'));
        $this->set('users', $this->paginate());
    }
	
	public function admin_guest() {
        $this->User->recursive = 0;
		$this->paginate = array('conditions' => array('User.role' => 'guest') , 'order' => array('User.id' => 'desc'));
        $this->set('users', $this->paginate());
    }
    
    public function admin_home() {
         $this->set(array(
            'title_for_layout' => 'Painel de Controle'
        ));
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }
	
	public function edit($id = null) {
		
		$id = AuthComponent::user('id');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Cadastro alterado com sucesso.'));
                $this->redirect(array('/painel'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function admin_delete_guest ($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'guest'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'guest'));
    }
	
	
    
    /**
     * Dashboard do painel de controle
     */
    public function admin_dashboard() {
        $this->redirect(array('action' => 'home'));
    }
	
}