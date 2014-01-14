<?php
App::uses('AppController', 'Controller');
/**
 * People Controller
 *
 * @property Person $Person
 * @property PaginatorComponent $Paginator
 */
class PeopleController extends AppController {

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
		$this->Person->recursive = 0;
		$this->paginate = array('order' => array('Person.id' => 'desc'));
		$this->set('people', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
		$this->set('person', $this->Person->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Person->create();
			if ($this->Person->save($this->request->data)) {
				$this->Session->setFlash(__('The person has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person could not be saved. Please, try again.'));
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
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Person->save($this->request->data)) {
				$this->Session->setFlash(__('The person has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
			$this->request->data = $this->Person->find('first', $options);
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
		$this->Person->id = $id;
		if (!$this->Person->exists()) {
			throw new NotFoundException(__('Invalid person'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Person->delete()) {
			$this->Session->setFlash(__('The person has been deleted.'));
		} else {
			$this->Session->setFlash(__('The person could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function view($id = null) {

		preg_match('/(?:.*?)\-([0-9]+)\.html$/', $id, $matches);

		$id = $matches[1];

		$this -> Person -> id = $id;
		if (!$this -> Person -> exists()) {
			throw new NotFoundException(__('Invalid Person'));
		}

		$person = $this -> Person -> read(null, $id);

		$this -> set(compact('person'));
	}
	
	public function ultimas($id = null) {
		$options = array('conditions' => array('Person.id !=' => $id), 'order' => array('Person.id' => 'desc'), 'limit' => 4);
		return $this -> Person -> find('all', $options);
	}
	
	public function ultimasCapa() {
		$options = array('order' => array('Person.id' => 'desc'), 'limit' => 1);
		return $this -> Person -> find('all', $options);
	}
	
	public function lista () {
		
		
		$id = $this->params['page'];    
		
		if (empty($id)) {
			$id = 1;
		}
       
		$this->Person->recursive = 2;
		
		$this->paginate = array('limit' => 3 , 'page' => $id, 'order' => array('Person.id' => 'desc'));

		$historias = $this->paginate();

		$this->set('historias', $historias);
	
	}
}
