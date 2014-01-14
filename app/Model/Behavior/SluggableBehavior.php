<?php

App::uses('Multibyte', 'I18n');
App::uses('Inflector', 'Utility');
App::uses('ModelBehavior', 'Model');

class SluggableBehavior extends ModelBehavior {

	protected $_defaultSettings = array(
		'field' => 'slug',
		'separator' => '-'
	);

	public function setup(Model $Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias]))		
			$this->settings[$Model->alias] = $this->_defaultSettings;

		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);

		$this->addValidationRules($Model);
	}

	public function beforeValidate(Model $Model) {
		extract($this->settings[$Model->alias]);
		
		if ($Model->hasField($field)) {
			$displayField = $Model->data[$Model->alias][$Model->displayField];
			// Olá mundo

			$slug = Multibyte::strtolower($displayField); // olá mundo
			$slug = Inflector::slug($slug, $separator); // ola-mundo

			$Model->data[$Model->alias][$field] = $slug;
		}

		return parent::beforeValidate($Model);
	}
	
	protected function addValidationRules(Model $Model) {
		extract($this->settings[$Model->alias]);

		$validate = array(
			'formato' => array(
				'rule' => "/^[a-z0-9{$separator}]+$/",
				'message' => 'Formato inválido de slug'
			)
		);

		if (!isset($Model->validate[$field]))
			$Model->validate[$field] = array();

		$Model->validate[$field] = 
			array_merge($validate, $Model->validate[$field]);
	}

}