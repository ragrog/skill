<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public $uses = array('User');

	public function beforeFilter() {
		parent::beforeFilter();
		// ユーザー自身による登録とログアウトを許可する
		$this->Auth->allow('add', 'login', 'index');
		$this->set('auth', $this->Auth->user());
	}

	public function index() {
		$data = $this->User->getUserList();
		$this->set('data', $data);
	}

	public function view($id) {

	}

	// ユーザ新規登録
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				// return $this->redirect(array('action' => 'index'));
			}
		}
	}

	// ユーザログイン
	public function  login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			}
		}
	}

	// ユーザログアウト
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
