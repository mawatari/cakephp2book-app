<?php

class TasksController extends AppController {
	public $scaffold;
	public $helper = array('Html', 'Form');

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
		$this->flash($msg, '/Tasks/index');
	}
}
