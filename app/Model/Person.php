<?php
App::uses('AppModel', 'Model');
/**
 * Person Model
 *
 * @property Photo $Photo
 */
class Person extends AppModel {

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
		'subtitulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório',
				'allowEmpty' => false,
			),
		)
	);
	
	var $actsAs = array('Sluggable');


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'person_id',
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
