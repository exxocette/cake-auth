<?php
class AddDataUser extends CakeMigration {

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
		),
		'down' => array(
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
            $users = ClassRegistry::init('User');
            if ($direction == 'up') {
                $data[0]['User']['username'] = 'admin';
                $data[0]['User']['email'] = 'admin@demo.com';
                $data[0]['User']['password'] = 'admin';
                $data[0]['User']['role_id'] = 1; //Admin
                $data[0]['User']['is_new'] = 0;
                $data[0]['User']['is_approved'] = 1; //Active
                $data[0]['User']['created_by'] = 1;
                $data[0]['User']['created'] = date('Y-m-d H:i:s');
                $data[0]['User']['modified'] = date('Y-m-d H:i:s');

                $users->create();
                if ($users->saveAll($data)) {
                    echo "      > Users table has been initialized\n\n";
                } else {
                    echo "      > Warning, Users table failed to initialized!!!\n\n";
                }
            }

		return true;
	}
}
