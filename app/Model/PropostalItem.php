<?php


class PropostalItem extends AppModel
{
    public $actAs = array('Containable');

    public $belongsTo = array(
        'LicitationItem' => array(
            'className' => 'LicitationItem',
            'dependent' => true,
            'exclusive' => true
        ),
        'Proposal' => array(
            'className' => 'Proposal',
            'dependent' => true,
            'exclusive' => true
        ),
    );

    public $validate = array(
        'unity_value' => array(
            'rule' => array('decimal', 2)
        )
    );
}