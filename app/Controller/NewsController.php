<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class NewsController extends AppController {

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
		$this -> News -> recursive = 0;
		$this->paginate = array('order' => array('News.id' => 'desc'));
		$this -> set('news', $this -> Paginator -> paginate());
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> News -> create();
			if ($this -> News -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The news has been saved.'));
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The news could not be saved. Please, try again.'));
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
		if (!$this -> News -> exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> News -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The news has been saved.'));
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this -> News -> primaryKey => $id));
			$this -> request -> data = $this -> News -> find('first', $options);
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
		$this -> News -> id = $id;
		if (!$this -> News -> exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this -> request -> onlyAllow('post', 'delete');
		if ($this -> News -> delete()) {
			$this -> Session -> setFlash(__('The news has been deleted.'));
		} else {
			$this -> Session -> setFlash(__('The news could not be deleted. Please, try again.'));
		}
		return $this -> redirect(array('action' => 'index'));
	}
	
	public function admin_view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}
	
	public function view($id = null) {

		preg_match('/(?:.*?)\-([0-9]+)\.html$/', $id, $matches);

		$id = $matches[1];

		$this -> News -> id = $id;
		if (!$this -> News -> exists()) {
			throw new NotFoundException(__('Invalid news'));
		}

		$news = $this -> News -> read(null, $id);

		$this -> set(compact('news'));
	}
	
	public function ultimas($id = null) {
		$options = array('conditions' => array('News.id !=' => $id, 'News.status' =>'publicado'), 'order' => array('News.id' => 'desc'), 'limit' => 4);
		return $this -> News -> find('all', $options);
	}
	
	public function emfoco() {
		
		$options = array('conditions'=> array('News.emfoco' =>'sim', 'News.status' =>'publicado'), 'order' => array('News.id' => 'desc'));
		return $this -> News -> find('all', $options);
	}
	
	public function lista () {
		
		
		$id = $this->params['page'];    
		
		if (empty($id)) {
			$id = 1;
		}
       
		$this->News->recursive = 2;
		
		$this->paginate = array('limit' => 10 , 'page' => $id, 'conditions'=> array( 'News.status' =>'publicado'), 'order' => array('News.id' => 'desc'));

		$news = $this->paginate();

		$this->set('news', $news);
	
	}

	public function destaqueCapa() {
		$options = array('conditions'=> array('News.destaque_home' =>'sim', 'News.status' =>'publicado'),'order' => array('News.id' => 'desc'));
		return $this -> News -> find('first', $options);
	}
	
	public function ultimasCapa() {
		$options = array('conditions'=> array( 'News.status' =>'publicado'),'order' => array('News.id' => 'desc'), 'limit' => 2);
		return $this -> News -> find('all', $options);
	}
	
	public function admin_carrega($id= null) {
		$options = array('conditions'=> array( 'News.id' => $id));
		return $this -> News -> find('first', $options);
	}
	
	public function carrega($id= null) {
		$options = array('conditions'=> array( 'News.id' => $id));
		return $this -> News -> find('first', $options);
	}
	
	
}
