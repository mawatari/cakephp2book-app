<?php

class TasksController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$options = array(
			'conditions' => array(
				'Task.status' => 0
			)
		);
		$tasks_data = $this->Task->find('all', $options);
		$this->set('tasks_data', $tasks_data);

		$this->render('index');
	}

	public function done() {
		$id = $this->request->pass[0];
		$this->Task->id = $id;
		$this->Task->saveField('status', 1);
		$msg = sprintf('タスク %s を完了しました。', $id);

		$this->Session->setFlash($msg);
		$this->redirect('/Tasks/index');
	}

	public function create() {
		if ($this->request->is('post')) {
			$data = array(
				'name' => $this->request->data['name']
			);

			$id = $this->Task->save($data);
			$msg = sprintf('タスク %s を登録しました。', $this->Task->id);

			$this->Session->setFlash($msg);
			$this->redirect('/Tasks/index');
		}
		$this->render('create');
	}
}
