<?php

class Proposal extends Model
{
    public $belongsTo = array(
        'Licitation' => array(
            'className' => 'Licitation',
            'dependent' => true,
            'exclusive' => true
        ),
        'User' => array(
            'className' => 'User'
        )
    );

    public $hasMany = array(
        'ProposalItem' => array(
            'className' => 'ProposalItem',
        )
    );
}