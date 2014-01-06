<?php
/**
 * Application level Controller
 *
 * Always use 'admin_' prefix each admin function
 * include view name.
 *
 * @license		Demo Project
 * @package		app.Controller.Users
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
    * Public Application
    *
    * Registration 
    */
    public function registration(){
        $this->layout = 'login';
        $arrData = $this->request->data;
        if ($this->request->is('post')) {
            $arrData['User']['hand_phone'] = $this->replacePlusAndZero($arrData['User']['hand_phone']);
            $arrData['User']['role_id'] = 4;
            $arrData['User']['is_approved'] = 2;
            $arrData['User']['is_new'] = 1;
            $arrData['User']['mode_flag'] = 3; //Reg using web/wap

            $arrUserByHandPhone = $this->User->getUserByPhone($arrData['User']['hand_phone']);
            $arrUserByEmail = !empty($arrData['User']['email']) ? $this->User->getUserByEmail($arrData['User']['email']) : array();

            if ($arrUserByHandPhone && $arrUserByEmail) {
                $this->Session->setFlash(__('<i class="fa fa-info-circle"></i>Gagal mendaftar. Alamat email dan nomor handphone telah terdaftar sebelumnya.'), 'default', array('class' => 'error_login'));
            } elseif ($arrUserByHandPhone && !$arrUserByEmail) {
                $this->Session->setFlash(__('<i class="fa fa-info-circle"></i>Gagal mendaftar. Nomor handphone telah terdaftar sebelumnya.'), 'default', array('class' => 'error_login'));
            } elseif ($arrUserByEmail && !$arrUserByHandPhone) {
                $this->Session->setFlash(__('<i class="fa fa-info-circle"></i>Gagal mendaftar. Alamat email telah terdaftar sebelumnya.'), 'default', array('class' => 'error_login'));
            } else {
                if ($this->User->saveAssociated($arrData)) {
                    $arrData['User']['created_by'] = $this->User->id;
                    $this->User->save($arrData);
                    if (!empty($arrData['User']['email'])) {
                        $subject = '[TLOKER] Info Registrasi';
                        $to = $arrData['User']['email'];
                        $template = 'registration';
                        $options['User']['email'] = $arrData['User']['email'];
                        $options['User']['hand_phone'] = $arrData['User']['hand_phone'];
                        $options['User']['password'] = $arrData['User']['password'];

                        $sendEmail = $this->_sendEmail($subject, $to, $template, $options);
                    }
                    return $this->redirect('/confirmations/message/registration/succeed');
                } else {
                    $this->Session->setFlash(__('<i class="fa fa-info-circle"></i>Gagal mendaftar. Silakan cek data anda dan ulang kembali.'), 'default', array('class' => 'error_login'));
                }
            }
        }
        $this->request->data = $arrData;
    }


    /**
     * Public Application
     *
     * Login page
     *
     */
    public function login() {
        $cookie = $this->Cookie->read('rememberMe');

        if ($this->request->is('post')) {
            if (isset($this->request->data['User']['rememberMe'])) {
                $cookie = array(
                    'username' => $this->request->data['User']['username'],
                    'password' => $this->request->data['User']['password'],
                    'rememberMe' => $this->request->data['User']['rememberMe']
                );
                $this->Cookie->write('rememberMe', $cookie, false, '1800');
            } else {
                $this->Cookie->delete('rememberMe');
            }

            // Change field credential when user using email
            $strUsername = $this->request->data['User']['username'];
            $isEmail = strstr($strUsername, '@');
            if ($isEmail) 
                $this->request->data['User']['email'] = $strUsername;

            if ($this->Auth->login()) {
                // redirect funtion on AppController
                $this->redirectLogin();
            } else {
                $this->Session->setFlash(__('<strong>FAILS!</strong> Credential is wrong, please try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }

        $this->request->data['User']['username'] = !empty($cookie['username']) ? $cookie['username'] : '';
        $this->request->data['User']['password'] = !empty($cookie['password']) ? $cookie['password'] : '';
        $this->request->data['User']['rememberMe'] = !empty($cookie['rememberMe']) ? 'checked' : '';

        $this->layout = 'login';
    }

    /**
     * Public Application
     *
     * Logout page
     */
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}