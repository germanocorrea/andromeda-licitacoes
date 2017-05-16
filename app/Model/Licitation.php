<?php

/**
 * Created by PhpStorm.
 * User: CTA-ARQUIMEDES-01
 * Date: 02/05/2017
 * Time: 11:14
 */
class Licitation extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'open_date' => array(
            'openRule1' => array(
                'rule' => 'notBlank',
                'message' => 'Data de Abertura vazia'
            ),
            'openRule2' => array(
                'rule' => 'date',
                'message' => 'Dados inválidos no campo Data de Abertura'
            )
        ),
        'end_date' => array(
            'endRule1' => array(
                'rule' => 'notBlank',
                'message' => 'Data de Fechamento vazia'
            ),
            'endRule2' => array(
                'rule' => 'date',
                'message' => 'Dados inválidos no campo Data de Fechament'
            )
        ),
        'state' => array(
            'stateRule' => array(
                'rule' => array('equalTo', 'CRIADA'),
                'message' => 'Formato de estado inválido'
            )
        )
    );

    public $hasMany = array(
        'LicitationItem' => array(
            'className' => 'LicitationItem',
        ),
        'Proposal' => array(
            'className' => 'Proposal',
        )
    );
}