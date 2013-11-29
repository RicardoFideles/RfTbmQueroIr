<?php
App::uses('AppController', 'Controller');
/**
 * Latests Controller
 *
 * @property Latest $Latest
 * @property PaginatorComponent $Paginator
 */
class LatestsController extends AppController {

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
	public function index() {
		$this->Latest->recursive = 0;
		$this->set('latests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Latest->exists($id)) {
			throw new NotFoundException(__('Invalid latest'));
		}
		$options = array('conditions' => array('Latest.' . $this->Latest->primaryKey => $id));
		$this->set('latest', $this->Latest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Latest->create();
			if ($this->Latest->save($this->request->data)) {
				$this->Session->setFlash(__('The latest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The latest could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->Latest->exists($id)) {
			throw new NotFoundException(__('Invalid latest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Latest->save($this->request->data)) {
				$this->Session->setFlash(__('The latest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The latest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Latest.' . $this->Latest->primaryKey => $id));
			$this->request->data = $this->Latest->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Latest->id = $id;
		if (!$this->Latest->exists()) {
			throw new NotFoundException(__('Invalid latest'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Latest->delete()) {
			$this->Session->setFlash(__('The latest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The latest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
