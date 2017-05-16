<?php

/**
 * Created by PhpStorm.
 * User: ggcorrea
 * Date: 11/05/17
 * Time: 16:34
 */
class ProposalsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash', 'Time');
    public $components = array('Flash');

    public function all($licitation_id)
    {
        $this->set('licitation_id', $licitation_id);
        $proposals = $this->Proposal->find('all', array(
            'conditions' => array('licitation_id' => $licitation_id)
        ));
        if ($proposals == null)
            $this->Flash->default('Não há propostas cadastradas para esta licitação');
        else
            $this->set('proposals', $proposals);
    }

    public function view($id = null)
    {
        if ($id == null) $this->redirect(array('action' => 'all'));
        else if ($proposal = $this->Proposal->findById($id))
        {
            if ($proposal['LicitationItem'] = $this->Proposal->Licitation->LicitationItem->find('all', array(
                'conditions' => array(
                    'licitation_id' => $proposal['Licitation']['id']
                )
            )))
                $this->set('proposal', $proposal);
        };
    }

    public function edit($id = null, $licitation_id)
    {
        $this->Proposal->id = $id;
        $licitation_item = $this->Proposal->Licitation->LicitationItem->find('all', array(
            'conditions' => array(
                'licitation_id' => $licitation_id
            )
        ));
        foreach ($licitation_item as $i => $item)
        {
            $licitation_item[$i] = $item['LicitationItem'];
        }

        if ($this->request->is('get'))
            $this->request->data = $this->Proposal->findById($id);

        $toSet = $this->request->data;

        $toSet['LicitationItem'] = $licitation_item;

        $licitation = $this->Proposal->Licitation->findById($licitation_id);
        $toSet['Licitation'] = $licitation['Licitation'];

        $this->set('licitation', $toSet);

        if(!$this->request->is('get'))
        {
            try
            {
                $this->request->data['Proposal']['id'] = $id;
                $this->Proposal->saveAll($this->request->data);
                $this->Flash->success('Proposta Salva');
                $this->redirect(array('action' => 'all', $licitation_id));
            }
            catch (Exception $e)
            {
                $this->Flash->Danger($e);
            }
        }
    }

    public function delete($id, $licitation_id)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Proposal->deleteAll($id, true)) {
            $this->Flash->success('A proposta nº ' . $id . ' foi deletada.');
            $this->redirect(array('action' => 'all', $licitation_id));
        }
    }

    public function add($licitation_id)
    {
        $this->set('licitation', $this->Proposal->Licitation->findById($licitation_id));
        if ($this->request->is('post'))
        {
            if ($this->Proposal->saveAll($this->request->data))
            {
                $this->Flash->success('Sua proposta foi criada');
                $this->redirect(array('action' => 'all', $licitation_id));
            }
            else
            {
                foreach ($this->Proposal->validationErrors as $error)
                    $this->Flash->default($error[0]);
            }
        }
    }

    public function compare($licitation_id)
    {
        $data = $this->Proposal->find('all', array(
            'conditions' => array(
                'licitation_id' => $licitation_id
            )
        ));

        $items = $this->Proposal->Licitation->LicitationItem->find('all', array(
            'conditions' => array(
                'licitation_id' => $licitation_id
            )
        ));

        foreach ($data as $p => $proposal)
        {
            foreach ($proposal['ProposalItem'] as $pi => $prop_item)
            {
                foreach ($items as $i => $item)
                {
                    if ($prop_item['licitation_item_id'] == $item['LicitationItem']['id'])
                        $data[$p]['ProposalItem'][$pi]['LicitationItem'] = $item['LicitationItem'];
                }
            }
        }

        if (!empty($data)) $this->set('data', $data);

        if (!empty($items)) $this->set('items', $items);
    }
    public function choose($id)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Proposal->id = $id;
        if ($this->Proposal->saveField('choosed', true))
        {
            $this->Proposal->Licitation->id = $this->Proposal->field('licitation_id');
            if ($this->Proposal->Licitation->saveField('state', 'HOMOLOGADA'))
            {
                $this->Flash->success('Licitação Homologada com sucesso!');
                $this->redirect('/licitations/view/' . $this->Proposal->Licitation->field('id'));
            }
        }
    }
}