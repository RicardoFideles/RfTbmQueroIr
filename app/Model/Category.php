<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property City $City
 */
class Category extends AppModel {

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
				'allowEmpty' => false
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'City' => array(
			'className' => 'City',
			'joinTable' => 'categories_cities',
			'foreignKey' => 'category_id',
			'associationForeignKey' => 'city_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	var $actsAs = array('Sluggable');
	
	public $hasMany = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'category_id',
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
