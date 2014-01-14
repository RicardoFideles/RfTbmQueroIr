<?php
App::uses('AppController', 'Controller');
/**
 * Interviews Controller
 *
 * @property Interview $Interview
 * @property PaginatorComponent $Paginator
 */
class InterviewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Interview->recursive = 0;
		$this->paginate = array('order' => array('Interview.id' => 'desc'));
		$this->set('interviews', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Interview->exists($id)) {
			throw new NotFoundException(__('Invalid interview'));
		}
		$options = array('conditions' => array('Interview.' . $this->Interview->primaryKey => $id));
		$this->set('interview', $this->Interview->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Interview->create();
			if ($this->Interview->save($this->request->data)) {
				$this->Session->setFlash(__('The interview has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interview could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Interview->exists($id)) {
			throw new NotFoundException(__('Invalid interview'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Interview->save($this->request->data)) {
				$this->Session->setFlash(__('The interview has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interview could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Interview.' . $this->Interview->primaryKey => $id));
			$this->request->data = $this->Interview->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Interview->id = $id;
		if (!$this->Interview->exists()) {
			throw new NotFoundException(__('Invalid interview'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Interview->delete()) {
			$this->Session->setFlash(__('The interview has been deleted.'));
		} else {
			$this->Session->setFlash(__('The interview could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function view($id = null) {

		preg_match('/(?:.*?)\-([0-9]+)\.html$/', $id, $matches);

		$id = $matches[1];

		$this -> Interview -> id = $id;
		if (!$this -> Interview -> exists()) {
			throw new NotFoundException(__('Invalid news'));
		}

		$interview = $this -> Interview -> read(null, $id);

		$this -> set(compact('interview'));
	}
	
	public function lista () {
		
		
		$id = $this->params['page'];    
		
		if (empty($id)) {
			$id = 1;
		}
       
		$this->Interview->recursive = 2;
		
		$this->paginate = array('limit' => 7 , 'page' => $id, 'order' => array('Interview.id' => 'desc'));

		$interviews = $this->paginate();

		$this->set('interviews', $interviews);
	
	}
	
	public function ultimas($id = null) {
		$options = array('conditions' => array('Interview.id !=' => $id), 'order' => array('Interview.id' => 'desc'), 'limit' => 4);
		return $this -> Interview -> find('all', $options);
	}
	
	public function ultimasCapa() {
		$options = array('order' => array('Interview.id' => 'desc'), 'limit' => 1);
		return $this -> Interview -> find('all', $options);
	}
}
