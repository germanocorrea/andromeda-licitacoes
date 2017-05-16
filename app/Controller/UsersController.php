<?php

/**
 * Created by PhpStorm.
 * User: CTA-ARQUIMEDES-01
 * Date: 04/05/2017
 * Time: 10:39
 */
class UsersController extends AppController
{
    public $helpers = array('Flash', 'Form', 'Html', 'Js');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'login');
    }

    public function login() {
        if ($this->Auth->user('id') != null)
            $this->redirect($this->Auth->redirect());
        if ($this->request->isPost())
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Flash->error(__('Nome de usuário ou senha inválidos'));
            }
        if ($this->User->find('all') == null)
        {
            $this->request->data = array(
                'cpf_cnpj' => '000.000.000-00',
                'email' => 'admin@localhost.com',
                'name' => 'Administrador',
                'password' => 'admin',
                'address' => 'n.a.',
                'role' => 'gerente',
            );
            $this->User->save($this->request->data);
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Usuário não pôde ser salvo'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Usuário não pôde ser salvo'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Usuário deletado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Usuário não foi deletado'));
        $this->redirect(array('action' => 'index'));
    }
}