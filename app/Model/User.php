<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório',
				'allowEmpty' => false,
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório',
				'allowEmpty' => false,
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório',
				'allowEmpty' => false,
			),
			'minLength' => array(
                    'rule' => array('minLength', 6),
                    'required' => true,
                    'message' => 'Sua senha precisa conter pelo menos 6 caracteres.'
            ),
		),
		'password_confirm' => array(
            'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'message' => 'Confime sua senha.'
            ),
            'minLength' => array(
                    'rule' => array('minLength', 6),
                    'required' => true,
                    'message' => 'Sua senha precisa conter pelo menos 6 caracteres.'
            ),
            'passwordConfirmation' => array(
                    'rule'    => array('passwordConfirmation'),
            'message' => 'As duas senhas não conferem.'
            ),
            
        ),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email inválido',
				'allowEmpty' => false,
			),
		),
		'role' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Categoria inválida',
				'allowEmpty' => false,
			),
		),
	);
	
	public function passwordConfirmation($data){
         
        $password = AuthComponent::password($this->data['User']['password']);
		$password_confirmation = AuthComponent::password($this->data['User']['password_confirm']);
              
        if ($password == $password_confirmation) {
				return true;
		} else {
            return false;
		}
         
    }
	
	public function beforeSave($options = Array()) {
        if (isset($this->data['User']['password'])) {
            $password = AuthComponent::password($this->data['User']['password']);
            $this->data['User']['password'] = $password;
        }
        return parent::beforeSave();
	}
	
	public $hasMany = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
