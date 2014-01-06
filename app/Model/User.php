<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 */
class User extends AppModel {
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid email address',
                'allowEmpty' => true,
                'required' => false,
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Duplicate email, choose another email.',
                'allowEmpty' => true,
                'required' => false,
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        )
    );

    /**
    * Encrypt the password
    *
    * @var array
    */
    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        return true;
    }
}