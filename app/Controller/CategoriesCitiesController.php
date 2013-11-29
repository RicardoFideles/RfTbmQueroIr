<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesCities Controller
 *
 * @property CategoriesCity $CategoriesCity
 * @property PaginatorComponent $Paginator
 */
class CategoriesCitiesController extends AppController {

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
		$this->CategoriesCity->recursive = 0;
		$this->set('categoriesCities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesCity->exists($id)) {
			throw new NotFoundException(__('Invalid categories city'));
		}
		$options = array('conditions' => array('CategoriesCity.' . $this->CategoriesCity->primaryKey => $id));
		$this->set('categoriesCity', $this->CategoriesCity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesCity->create();
			if ($this->CategoriesCity->save($this->request->data)) {
				$this->Session->setFlash(__('The categories city has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories city could not be saved. Please, try again.'));
			}
		}
		$cities = $this->CategoriesCity->City->find('list');
		$categories = $this->CategoriesCity->Category->find('list');
		$this->set(compact('cities', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesCity->exists($id)) {
			throw new NotFoundException(__('Invalid categories city'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriesCity->save($this->request->data)) {
				$this->Session->setFlash(__('The categories city has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories city could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesCity.' . $this->CategoriesCity->primaryKey => $id));
			$this->request->data = $this->CategoriesCity->find('first', $options);
		}
		$cities = $this->CategoriesCity->City->find('list');
		$categories = $this->CategoriesCity->Category->find('list');
		$this->set(compact('cities', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesCity->id = $id;
		if (!$this->CategoriesCity->exists()) {
			throw new NotFoundException(__('Invalid categories city'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriesCity->delete()) {
			$this->Session->setFlash(__('The categories city has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categories city could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
