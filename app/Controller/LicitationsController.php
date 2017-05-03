<?php

class LicitationsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index()
    {
//        List all licitations
        $licitations = $this->Licitation->find('all');
        if ($licitations == null)
            $this->Flash->default('Não há licitações cadastradas');
        else
            $this->set('licitations', $licitations);
    }

    public function search()
    {
        if ($this->request->is('get'))
        {
            // TODO: search
        }
    }

    public function view($id = null)
    {
        if ($id == null) $this->redirect(array('action' => 'index'));
        else if ($licitation = $this->Licitation->findById($id)) $this->set('licitation', $licitation);
    }

    public function edit($id = null)
    {
        $this->Licitation->id = $id;
        if ($this->request->is('get'))
        {
            $this->request->data = $this->Licitation->findById($id);
        }
        else
        {
            if ($this->Licitation->save($this->request->data))
            {
                $this->Flash->success('Licitação Salva');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Licitation->delete($id)) {
            $this->Flash->success('A licitação nº ' . $id . ' foi deletada.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function add()
    {
        if ($this->request->is('post'))
        {
            if ($this->Licitation->save($this->request->data))
            {
                $this->Flash->success('Sua licitação foi salva');
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                foreach ($this->Licitation->validationErrors as $error)
                    $this->Flash->default($error[0]);
            }
        }
    }

    public function compare($id)
    {}
}