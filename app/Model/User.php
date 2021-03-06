<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'A username is required'
			),
			'Unique' => array(
				'rule' => 'isUnique',
				'message' => 'already used.'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'A password is required'
			)
		)
	);
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}

	public function getUserList(){
		$data = $this->find('all', array(
				'fields' => array(
					'User.id',
					'User.username'
				)
		));
		return $data;
	}
}