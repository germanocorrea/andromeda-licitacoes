<?php


class LicitationItem extends AppModel
{
//    TODO: validações de itens
    public $belongsTo = array(
        'Licitation' => array(
            'className' => 'Licitation',
            'dependent' => true,
            'exclusive' => true
        )
    );

    public $hasMany = array(
        'ProposalItem' => array(
            'className' => 'ProposalItem'
        )
    );
}