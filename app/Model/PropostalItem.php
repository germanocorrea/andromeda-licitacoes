<?php

/**
 * Created by PhpStorm.
 * User: ggcorrea
 * Date: 15/05/17
 * Time: 08:49
 */
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
}