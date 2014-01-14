<?php
App::uses('AppController', 'Controller');
/**
 * Establishments Controller
 *
 * @property Establishment $Establishment
 * @property PaginatorComponent $Paginator
 */
class EstablishmentsController extends AppController {

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
		$this->Establishment->recursive = 0;
		$this->set('establishments', $this->Paginator->paginate());
	}
	
	public function admin_destaque() {
		$this->Establishment->recursive = 0;
		$this->paginate = array('conditions' => array('Establishment.destaque' => 'sim'));
		$this->set('establishments', $this->Paginator->paginate());
	}
	
	public function admin_lista($cidade = null, $categoria = null) {
		
		if (!empty($cidade) && !empty($categoria)) {
			$conditions = array('conditions' => array('Establishment.city_id' => $cidade, 'Establishment.category_id' => $categoria, 'Establishment.destaque' => 'sim'));
		} else {
			if (!empty($cidade)) {
				$conditions = array('conditions' => array('Establishment.city_id' => $cidade, 'Establishment.destaque' => 'sim'));
			} else {
				$conditions = array('conditions' => array('Establishment.destaque' => 'sim'));
			}
		}
		
		
		$establishments = $this->Establishment->find('all', $conditions);
		
		$options = array('conditions' => array('City.' . $this->City->primaryKey => $cidade));
		
		$this->loadModel('City');
		$city = $this->City->find('first', $options);
		
		$this->set(compact ('establishments', 'city'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Establishment->exists($id)) {
			throw new NotFoundException(__('Invalid establishment'));
		}
		$options = array('conditions' => array('Establishment.' . $this->Establishment->primaryKey => $id));
		$this->set('establishment', $this->Establishment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Establishment->create();
			if ($this->Establishment->save($this->request->data)) {
				$this->Session->setFlash(__('The establishment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The establishment could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Establishment->Category->find('list');
		$cities = $this->Establishment->City->find('list');
		$this->set(compact('categories', 'cities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Establishment->exists($id)) {
			throw new NotFoundException(__('Invalid establishment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Establishment->save($this->request->data)) {
				$this->Session->setFlash(__('The establishment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The establishment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Establishment.' . $this->Establishment->primaryKey => $id));
			$this->request->data = $this->Establishment->find('first', $options);
		}
		$categories = $this->Establishment->Category->find('list');
		$cities = $this->Establishment->City->find('list');
		$this->set(compact('categories', 'cities'));
	}
	
	public function admin_edit_destaque($id = null) {
		
		if (!$this->Establishment->exists($id)) {
			throw new NotFoundException(__('Invalid establishment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$id_cidade = $this->request->data['Establishment']['city_id'];
		
			
			if ($this->Establishment->save($this->request->data)) {
				$this->Session->setFlash(__('The establishment has been saved.'));
				return $this->redirect(array('action' => 'lista', $id_cidade ));
			} else {
				$this->Session->setFlash(__('The establishment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Establishment.' . $this->Establishment->primaryKey => $id));
			$this->request->data = $this->Establishment->find('first', $options);
		}
		$categories = $this->Establishment->Category->find('list');
		$cities = $this->Establishment->City->find('list');
		$this->set(compact('categories', 'cities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Establishment->id = $id;
		if (!$this->Establishment->exists()) {
			throw new NotFoundException(__('Invalid establishment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Establishment->delete()) {
			$this->Session->setFlash(__('The establishment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The establishment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_pesquisar($id_cidade = null) {
		
		$id_categoria = $this->request->data['Establishment']['category_id'];
		
		$this->layout = 'ajax';
		
		$options = array('conditions' => array('Establishment.city_id' => $id_cidade, 'Establishment.category_id' => $id_categoria));
		
		$establishments = $this->Establishment->find('all', $options);
		
		$this -> set(compact('establishments'));
		
	}
	
	public function view($id = null) {

		preg_match('/(?:.*?)\-([0-9]+)\.html$/', $id, $matches);

		$id = $matches[1];

		$this -> Establishment -> id = $id;
		if (!$this -> Establishment -> exists()) {
			throw new NotFoundException(__('Estabelecimento inexistente'));
		}
		
		$this->Establishment->recursive = 2;

		$establishment = $this -> Establishment -> read(null, $id);
		
		
		$this->loadModel('Category');
		
		$category = $this->Category->findById($establishment['Category']['id']);
		
		$this -> set(compact('establishment','category' ));
	}
	
	public function ultimas() {
		$options = array('order' => array('Establishment.id' => 'desc'), 'limit' => 4);
		return $this->Establishment->find('all', $options);
	}
	
	public function lista ($categoria = null, $page = null) {
		
		$this->loadModel('Category');
		
		$this->Category->recursive = 2;
		
		$catTemp = $this->Category->findBySlug($categoria);
		
		if ($catTemp != null && !empty($catTemp) && ($catTemp['Category']['id'] != null)) {
			
			$idCategoria = $catTemp['Category']['id'];
			
			
			$this->Category->id = $idCategoria;
			
 			if ($this -> Category -> exists()) {
 				
				$category = $catTemp;
				
				if (empty($page)) {
					$page = 1;
				}
				
				$cidadeSelecionada =  Configure::read('Config.cidadeSelecionada');
		
				$id_cidadeSelecionada = $cidadeSelecionada['City']['id'];
				
						
				$this->Establishment->recursive = 2;
				
				$this->paginate = array('limit' => 6 , 'page' => $page, 'conditions' => array('Establishment.category_id' => $idCategoria, 'Establishment.city_id' => $id_cidadeSelecionada ));
		
				$establishments = $this->paginate();
		
				$this -> set(compact('establishments', 'category'));
 				
			}
				
		} else {
			return $this->redirect('/');
		}
		
	}
	
	public function destaqueCapa () {
		
		$cidadeSelecionada =  Configure::read('Config.cidadeSelecionada');
		
		$id_cidadeSelecionada = $cidadeSelecionada['City']['id'];
		
		
		$options = array('conditions' => array('Establishment.destaque' => 'sim', 'Establishment.city_id' => $id_cidadeSelecionada), 'limit' => 3);
		
		return $this->Establishment->find('all', $options);
		
	}

	public function outros () {
		
		$cidadeSelecionada =  Configure::read('Config.cidadeSelecionada');
		
		$id_cidadeSelecionada = $cidadeSelecionada['City']['id'];
		
		
		$options = array('conditions' => array('Establishment.city_id' => $id_cidadeSelecionada));
		
		$lista = $this->Establishment->find('all', $options);
		shuffle($lista);
		
		$ultimos_tres_destaques = array();
		
		if (sizeof($lista) > 4)  {
			array_push($ultimos_tres_destaques, $lista[0], $lista[1], $lista[2], $lista[3]);
		}
		
		return $ultimos_tres_destaques; 
		
	}
	
	public function topHome () {
		
		$cidadeSelecionada =  Configure::read('Config.cidadeSelecionada');
		
		$id_cidadeSelecionada = $cidadeSelecionada['City']['id'];
		
		$options = array('conditions' => array('Establishment.city_id' => $id_cidadeSelecionada), 'order' => array('Establishment.media' => 'DESC'), 'limit' => 5);
		
		$lista = $this->Establishment->find('all', $options);
		
		return $lista;
		
	}
	
	public function topHomeCategorias ($id = null) {
		
		$this->loadModel('Category');
		
		if (!$this->Category->exists($id)) {
			return  '';
		}
		
		$cidadeSelecionada =  Configure::read('Config.cidadeSelecionada');
		
		$id_cidadeSelecionada = $cidadeSelecionada['City']['id'];
		
		$options = array('conditions' => array('Establishment.city_id' => $id_cidadeSelecionada, 'Establishment.category_id' => $id ), 'order' => array('Establishment.media' => 'DESC'), 'limit' => 5);
		
		$lista = $this->Establishment->find('all', $options);
		
		return $lista;
		
	}


}
