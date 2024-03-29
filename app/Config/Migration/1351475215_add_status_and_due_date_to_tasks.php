<?php
class AddStatusAndDueDateToTasks extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'tasks' => array(
					'status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'after' => 'body'),
					'due_date' => array('type' => 'date', 'null' => true, 'default' => NULL, 'after' => 'status'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'tasks' => array('status', 'due_date',),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
