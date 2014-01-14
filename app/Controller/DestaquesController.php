<?php
App::uses('AppController', 'Controller');
/**
 * Destaques Controller
 *
 * @property Destaque $Destaque
 * @property PaginatorComponent $Paginator
 */
class DestaquesController extends AppController {

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
		$this->Destaque->recursive = 0;
		$this->set('destaques', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Destaque->exists($id)) {
			throw new NotFoundException(__('Invalid destaque'));
		}
		$options = array('conditions' => array('Destaque.' . $this->Destaque->primaryKey => $id));
		$this->set('destaque', $this->Destaque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Destaque->create();
			if ($this->Destaque->save($this->request->data)) {
				$this->Session->setFlash(__('The destaque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destaque could not be saved. Please, try again.'));
			}
		}
		$news = $this->Destaque->News->find('list');
		$people = $this->Destaque->Person->find('list');
		$interviews = $this->Destaque->Interview->find('list');
		$this->set(compact('news', 'people', 'interviews'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Destaque->exists($id)) {
			throw new NotFoundException(__('Invalid destaque'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Destaque->save($this->request->data)) {
				$this->Session->setFlash(__('The destaque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destaque could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Destaque.' . $this->Destaque->primaryKey => $id));
			$this->request->data = $this->Destaque->find('first', $options);
		}
		$news = $this->Destaque->News->find('list');
		$people = $this->Destaque->Person->find('list');
		$interviews = $this->Destaque->Interview->find('list');
		$this->set(compact('news', 'people', 'interviews'));
	}
	
	public function capa () {
		$this->Destaque->recursive = 2;
		return $this->Destaque->find('first');
	}

}
