<?php

class TasksController extends AppController {
	public $scaffold;
	public $helper = array('Html', 'Form');

	public function index() {
		$tasks_data = array();
		$this->set('tasks_data', $tasks_data);

		$this->render('index');
	}

	public function done() {
		$msg = sprintf('タスク %s を完了しました。', $this->request->pass[0]);
		$this->flash($msg, '/Tasks/index');
	}
}
