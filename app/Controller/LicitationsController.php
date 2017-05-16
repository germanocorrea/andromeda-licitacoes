<?php

App::uses('CakeTime', 'Utility');

class LicitationsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash', 'Time');

    public function index()
    {
        $licitations = $this->Licitation->find('all');
        if ($licitations == null)
            $this->Flash->default('Não há licitações cadastradas');
        else
        {
            foreach ($licitations as $l => $licitation)
            {
                if (
                    (CakeTime::isToday($licitation['Licitation']['open_date'], 'America/Sao_Paulo') ||
                        CakeTime::isPast($licitation['Licitation']['open_date'], 'America/Sao_Paulo')) &&
                    $licitation['Licitation']['state'] == 'CRIADA'
                )
                {
                    $licitation['Licitation']['state'] = 'ABERTA';
                    $licitations[$l]['Licitation']['state'] = 'ABERTA';

                    $this->Licitation->id = $licitation['Licitation']['id'];

                    if ($this->Licitation->saveField('state', 'ABERTA'))
                    {
                        $this->Licitation->clear();
                        $this->Flash->success('Licitação ' . $licitation['Licitation']['name'] . ' alterou seu estado com sucesso');
                    }
                    else $this->Flash->default('Ocorreu um erro ao atualizar o estado das licitação ' . $licitation['Licitation']['name']);
                }

                if (
                    (CakeTime::isToday($licitation['Licitation']['end_date'], 'America/Sao_Paulo') ||
                        CakeTime::isPast($licitation['Licitation']['end_date'], 'America/Sao_Paulo')) &&
                    $licitation['Licitation']['state'] == 'ABERTA'
                )
                {
                    $licitation['Licitation']['state'] = 'FINALIZADA';
                    $licitations[$l]['Licitation']['state'] = 'FINALIZADA';

                    $this->Licitation->id = $licitation['Licitation']['id'];

                    if ($this->Licitation->saveField('state', 'FINALIZADA'))
                    {
                        $this->Licitation->clear();
                        $this->Flash->success('Licitação ' . $licitation['Licitation']['name'] . ' alterou seus estado com sucesso');
                    }
                    else $this->Flash->default('Ocorreu um erro ao atualizar o estado da licitação ' . $licitation['Licitation']['name']);
                }
            }
            $this->set('licitations', $licitations);
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
        if ($this->Licitation->delete($id, true)) {
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
}