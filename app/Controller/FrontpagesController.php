<?php

class FrontpagesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function home() {
        if ($this->request->is('post')) {
            if (!isset($this->request->data['User']['rememberMe'])) $this->request->data['User']['rememberMe'] = '0';
            $this->request->data = $this->setDataEmailPhone($this->request->data);
            if ($this->request->data['User']['rememberMe'] == 1) {
                $cookie = array(
                    'username' => $this->request->data['User']['username'],
                    'password' => $this->request->data['User']['password'],
                    'rememberMe' => $this->request->data['User']['rememberMe']
                );
                $this->Cookie->write('rememberMe', $cookie, false, '1800');
            } else {
                $this->Cookie->delete('rememberMe');
            }

            if ($this->Auth->login()) {
                $this->redirectLogin();
            } else {
                $this->Session->setFlash(__('Email atau nomor telepon yang anda masukan salah, silahkan login kembali.'), 'default', array('class' => 'error_login'));
            }
        }

        $this->request->data['User']['username'] = !empty($cookie['username']) ? $cookie['username'] : '';
        $this->request->data['User']['password'] = !empty($cookie['password']) ? $cookie['password'] : '';
        $this->request->data['User']['rememberMe'] = !empty($cookie['rememberMe']) ? 'checked' : '';
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}