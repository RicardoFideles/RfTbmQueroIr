<?php
App::uses('AppController', 'Controller');
/**
 * Enquetes Controller
 *
 * @property Enquete $Enquete
 * @property PaginatorComponent $Paginator
 */
class EnquetesController extends AppController {

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
		$this->Enquete->recursive = 0;
		$this->set('enquetes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Enquete->exists($id)) {
			throw new NotFoundException(__('Invalid enquete'));
		}
		$options = array('conditions' => array('Enquete.' . $this->Enquete->primaryKey => $id));
		$this->set('enquete', $this->Enquete->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Enquete->create();
			if ($this->Enquete->save($this->request->data)) {
				$this->Session->setFlash(__('The enquete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquete could not be saved. Please, try again.'));
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
		if (!$this->Enquete->exists($id)) {
			throw new NotFoundException(__('Invalid enquete'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enquete->save($this->request->data)) {
				$this->Session->setFlash(__('The enquete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquete could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enquete.' . $this->Enquete->primaryKey => $id));
			$this->request->data = $this->Enquete->find('first', $options);
		}
	}
	
	public function edit() {
		
		$this->layout = 'ajax';
		
		$id = $this->request->data['Enquete']['id'];
		
		if (!$this->Enquete->exists($id)) {
			throw new NotFoundException(__('Invalid enquete'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$enquete = $this->Enquete->read(null, $id);
			
			$opcao_1 = $enquete['Enquete']['resposta_1'];
			$opcao_2 = $enquete['Enquete']['resposta_2'];
			$opcao_3 = $enquete['Enquete']['resposta_3'];
			$opcao_4 = $enquete['Enquete']['resposta_4'];
			$opcao_5 = $enquete['Enquete']['resposta_5'];
			
			
			if (!empty($this->request->data['Enquete']['resposta_1'])) {
				$opcao_1_enviada = 1;
				
				$opcao_1 += $opcao_1_enviada;
			}
			
			if (!empty($this->request->data['Enquete']['resposta_2'])) {
				$opcao_2_enviada = 1;
				$opcao_2 += $opcao_2_enviada;
			}
			
			if (!empty($this->request->data['Enquete']['resposta_3'])) {
				$opcao_3_enviada = 1;
				$opcao_3 += $opcao_3_enviada;
			}
			
			if (!empty($this->request->data['Enquete']['resposta_4'])) {
				$opcao_4_enviada = 1;
				$opcao_4 += $opcao_4_enviada;
			}
			
			if (!empty($this->request->data['Enquete']['resposta_5'])) {
				$opcao_5_enviada = 1;
				$opcao_5 += $opcao_5_enviada;
			}
			
			
			$this->Enquete->set('resposta_1', $opcao_1);
			$this->Enquete->set('resposta_2', $opcao_2);
			$this->Enquete->set('resposta_3', $opcao_3);
			$this->Enquete->set('resposta_4', $opcao_4);
			$this->Enquete->set('resposta_5', $opcao_5);
			
			if ($this->Enquete->save()) {
				$this->Session->setFlash(__('Votação realizada.'));
				$enquete = $this->Enquete->read(null, $id);
				
				$this->set('enquete', $enquete);
				
			} else {
				$this->Session->setFlash(__('Ocorreu um erro tente novamente.'));
			}
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
		$this->Enquete->id = $id;
		if (!$this->Enquete->exists()) {
			throw new NotFoundException(__('Invalid enquete'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Enquete->delete()) {
			$this->Session->setFlash(__('The enquete has been deleted.'));
		} else {
			$this->Session->setFlash(__('The enquete could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function enqueteCapa () {
		$options = array('conditions' => array('Enquete.destaque' => 'sim'));
		return $this->Enquete->find('first', $options);
	}
}
