<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

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
		$this->Comment->recursive = 0;
		$this->paginate = array('order' => array('Comment.id' => 'desc'));
		$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		$users = $this->Comment->User->find('list');
		$establishments = $this->Comment->Establishment->find('list');
		$news = $this->Comment->News->find('list');
		$interviews = $this->Comment->Interview->find('list');
		$people = $this->Comment->Person->find('list');
		$this->set(compact('users', 'establishments', 'news', 'interviews', 'people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$establishments = $this->Comment->Establishment->find('list');
		$news = $this->Comment->News->find('list');
		$interviews = $this->Comment->Interview->find('list');
		$people = $this->Comment->Person->find('list');
		$this->set(compact('users', 'establishments', 'news', 'interviews', 'people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		
		$commnet = $this->Comment->read(null, $id);
		$this->Comment->set('status', 'rejeitado');
		
		if ($this->Comment->save()) {
			$this->Session->setFlash(__('Comentário aprovado com sucesso.'));
		} else {
			$this->Session->setFlash(__('Ocorreu um erro ao tentar aprovar o comentário.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_apagar($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid Comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The Comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_aprove($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		
		$commnet = $this->Comment->read(null, $id);
		$this->Comment->set('status', 'aprovado');
		
		if ($this->Comment->save()) {
			$this->Session->setFlash(__('Comentário aprovado com sucesso.'));
		} else {
			$this->Session->setFlash(__('Ocorreu um erro ao tentar aprovar o comentário.'));
		}
		return $this->redirect(array('action' => 'index'));
		
	}
	
	public function add() {
		if ($this->request->is('post')) {
			
			
			$id_user = AuthComponent::user('id');
			
			$this->loadModel('User');
			
        	$this->User->id = $id_user;
        	if (!$this->User->exists()) {
            	$this->Session->setFlash("É necessário estar logado para comentar.");
					$this->redirect($this->referer());
        	}
			
			if ($this->Recaptcha->verify()) {
				
				$this->loadModel('Establishment');
				
				$id = $this->request->data['Establishment']['id'];
		
				if (!$this->Establishment->exists($id)) {
					$this->Session->setFlash("Ocorreu um erro tente novamente.");
					$this->redirect($this->referer());
				}
				
				
				
				
				$media_visual = 0;
				$media_auditiva = 0;
				$media_motora = 0;
				$media_intelectual = 0;
				
				$establishment = $this->Establishment->read(null, $id);
				
				
				
				if (!empty($this->request->data['Establishment']['visual'])) {
					
						
					$visual = $establishment['Establishment']['visual'];
					$total_visual = $establishment['Establishment']['visual_count'];

					$visual += $this->request->data['Establishment']['visual'];
					$total_visual += 1;
					
					$this->Establishment->set('visual', $visual);
					$this->Establishment->set('visual_count', $total_visual);
					
					$media_visual = $visual / $total_visual;
					
				} else {
					
					if (!empty($establishment['Establishment']['visual']) && !empty($establishment['Establishment']['visual_count'])) {
						if ($establishment['Establishment']['visual'] > 0 && $establishment['Establishment']['visual_count'] > 0) {
							$media_visual =  $establishment['Establishment']['visual'] / $establishment['Establishment']['visual_count'];
						}
							
					}
				}
				
				
				if (!empty($this->request->data['Establishment']['auditiva'])) {
						
					$auditiva = $establishment['Establishment']['auditiva'];
					$total_auditiva = $establishment['Establishment']['auditiva_count'];
					
					$auditiva += $this->request->data['Establishment']['auditiva'];
					$total_auditiva += 1;
					
					$this->Establishment->set('auditiva', $auditiva);
					$this->Establishment->set('auditiva_count', $total_auditiva);
					
					
					$media_visual = $auditiva / $total_auditiva;
					
				} else {
					
					if (!empty($establishment['Establishment']['auditiva']) && !empty($establishment['Establishment']['auditiva_count'])) {
						if ($establishment['Establishment']['auditiva'] > 0 && $establishment['Establishment']['auditiva_count'] > 0) {
							$media_auditiva =  $establishment['Establishment']['auditiva'] / $establishment['Establishment']['auditiva_count'];
						}
							
					} 
				}
				
				
				if (!empty($this->request->data['Establishment']['motora'])) {
						
					$motora = $establishment['Establishment']['motora'];
					$total_motora = $establishment['Establishment']['motora_count'];
					
					$motora += $this->request->data['Establishment']['motora'];
					$total_motora += 1;
					
					$this->Establishment->set('motora', $motora);
					$this->Establishment->set('motora_count', $total_motora);
					
					$media_motora = $motora / $total_motora; 
					
				} else {
					
					if (!empty($establishment['Establishment']['motora']) && !empty($establishment['Establishment']['motora_count'])) {
						if ($establishment['Establishment']['motora'] > 0 && $establishment['Establishment']['motora_count'] > 0) {
							$media_motora =  $establishment['Establishment']['motora'] / $establishment['Establishment']['motora_count'];
						}
							
					}
				}
				
				
				if (!empty($this->request->data['Establishment']['intelectual'])) {
						
					$intelectual = $establishment['Establishment']['intelectual'];
					$total_intelectual = $establishment['Establishment']['intelectual_count'];
					
					$intelectual += $this->request->data['Establishment']['intelectual'];
					$total_intelectual += 1;
					
					$this->Establishment->set('intelectual', $intelectual);
					$this->Establishment->set('intelectual_count', $total_intelectual);
					
					$media_intelectual = $intelectual / $total_intelectual;
					
				} else {
					
					if (!empty($establishment['Establishment']['intelectual']) && !empty($establishment['Establishment']['intelectual_count'])) {
						if ($establishment['Establishment']['intelectual'] > 0 && $establishment['Establishment']['intelectual_count'] > 0) {
							$media_intelectual =  $establishment['Establishment']['intelectual'] / $establishment['Establishment']['intelectual_count'];
						}
							
					}
				}

				$media_geral = ($media_auditiva + $media_motora + $media_visual +$media_intelectual) / 4 ;
				
				$media_geral = round($media_geral, 2, PHP_ROUND_HALF_DOWN);
				
				$this->Establishment->set('media', $media_geral);
				
				
				if ($this->Establishment->save()) {
					
					$this->request->data['Comment']['user_id'] = $id_user;
					$this->request->data['Comment']['status'] = 'aguardando';
					$this->request->data['Comment']['establishment_id'] = $id;
					
					
					$this->Comment->create();
					if ($this->Comment->save($this->request->data)) {
						$this->Session->setFlash(__('Voto computado com sucesso.'));
						$this->redirect($this->referer());
					} else {
						$this->Session->setFlash(__('Ocorreu um erro tente novamente.'));
						$this->redirect($this->referer());
					}
					
					
				} else {
					$this->Session->setFlash(__('Ocorreu um erro tente novamente.'));
					$this->redirect($this->referer());	
				}
				
		    } else {
		        $this->Session->setFlash($this->Recaptcha->error);
				$this->redirect($this->referer());
		    }
			
		}
	}
}
