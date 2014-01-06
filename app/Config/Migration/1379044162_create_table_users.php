<?php
class CreateTableUsers extends CakeMigration {

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
            'create_table' => array(
                'users' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'key' => 'primary'),
                    'username' => array(
                        'type' => 'string',
                        'length'  => 100,
                        'null' => true),
                    'email' => array(
                        'type' => 'string',
                        'length'  => 100,
                        'null' => true),
                    'password' => array(
                        'type' => 'string',
                        'length'  => 100,
                        'null' => true),
                    'is_approved' => array(
                        'type' => 'integer',
                        'length'  => 1,
                        'null' => false),
                    'is_new' => array(
                        'type' => 'integer',
                        'length'  => 1,
                        'null' => false),
                    'role_id' => array(
                        'type' => 'integer',
                        'null' => false),
                    'created_by' => array(
                        'type' => 'integer',
                        'null' => false),
                    'created' => array(
                        'type' => 'datetime',
                        'null' => true),
                    'modified' => array(
                        'type' => 'datetime',
                        'null' => true),
                    'indexes' => array(
                        'PRIMARY' => array(
                            'column' => 'id',
                            'unique' => 1)
                        )
                )
            )
        ),
        'down' => array(
            'drop_table' => array('users')
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