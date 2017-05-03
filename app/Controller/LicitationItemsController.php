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

    public function view($licitation_id, $id)
    {}

    public function edit($licitation_id, $id)
    {}

    public function add($licitation_id)
    {}

    public function all($licitation_id)
    {
        $items = $this->LicitationItem->find('all', array(
            'conditions' => array('LicitationItem.id' => $licitation_id)
        ));
        if ($items == null)
            $this->Flash->default('Não há itens cadastrados para esta licitação');
        else
            $this->set('items', $items);

        $this->set('licitation_id', $licitation_id);
    }
}