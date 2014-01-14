<?php
App::uses('AppModel', 'Model');
/**
 * Setting Model
 *
 */
class Setting extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email inválido',
			),
		),
		'link_facebook' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório',
			),
		),
		'link_twitter' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório',
			),
		),
	);
}
