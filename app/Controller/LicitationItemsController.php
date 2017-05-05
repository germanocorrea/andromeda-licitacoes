<?php

/**
 * Created by PhpStorm.
 * User: CTA-ARQUIMEDES-01
 * Date: 03/05/2017
 * Time: 10:36
 */
class LicitationItemsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash', 'Time');
    public $components = array('Flash');

    public function view($id = null)
    {
        if ($id == null) $this->redirect(array('action' => 'all'));
        else
        {
            if ($item = $this->LicitationItem->findById($id))
            {
                $this->set('item', $item);
            }

        }
    }

    public function edit($id)
    {
        $this->LicitationItem->id = $id;

        if ($this->request->is('get'))
        {
            $this->request->data = $this->LicitationItem->findById($id);
        }
        else
        {
            if ($this->LicitationItem->save($this->request->data))
            {
                $item = $this->LicitationItem->findById($id);
                $this->Flash->success('O item da licitação foi salvo');
                $this->redirect(array('action' => 'all', $item['Licitation']['id']));
            }
        }
    }

    public function add($licitation_id)
    {
        if ($this->request->is('post'))
        {
            if ($this->LicitationItem->save($this->request->data))
            {
                $this->Flash->success('O item da licitação foi adicionado');
                $this->redirect(array('action' => 'all', $licitation_id));
            }
            else
            {
                foreach ($this->LicitationItem->validationErrors as $error)
                    $this->Flash->default($error[0]);
            }
        }

        $this->set('licitation_id', $licitation_id);
    }

    public function all($licitation_id)
    {
        $items = $this->LicitationItem->find('all', array(
            'conditions' => array('licitation_id' => $licitation_id)
        ));
        if ($items == null)
            $this->Flash->default('Não há itens cadastrados para esta licitação');
        else
            $this->set('items', $items);

        $this->set('licitation_id', $licitation_id);
    }

    public function delete($licitation_id, $id)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->LicitationItem->delete($id)) {
            $this->Flash->success('O item nº ' . $id . ' foi deletado da licitação.');
            $this->redirect(array('action' => 'all', $licitation_id));
        }
    }
}