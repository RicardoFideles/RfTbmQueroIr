<?php
App::uses('AppController', 'Controller');
/**
 * Paginas Controller
 *
 * @property Pagina $Pagina
 * @property PaginatorComponent $Paginator
 */
class PaginasController extends AppController {

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
		$this->Pagina->recursive = 0;
		$this->set('paginas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
		$this->set('pagina', $this->Pagina->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Pagina->create();
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('The pagina has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
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
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('The pagina has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
			$this->request->data = $this->Pagina->find('first', $options);
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
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagina->delete()) {
			$this->Session->setFlash(__('The pagina has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pagina could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function sobre () {
		return $this->Pagina->find('all', array('conditions' => array('Pagina.slug' => 'sobre'), 'limit' => 1));
	}
	
	public function politica_privacidade () {
		return $this->Pagina->find('all', array('conditions' => array('Pagina.slug' => 'politica-de-privacidade'), 'limit' => 1));
	}
	
	public function texto_sobre_rodape () {
		return $this->Pagina->find('all', array('conditions' => array('Pagina.slug' => 'texto-sobre-o-rodape'), 'limit' => 1));
	}
	





}
