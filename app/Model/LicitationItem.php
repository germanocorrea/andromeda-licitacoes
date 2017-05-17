<?php


class LicitationItem extends AppModel
{
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

    public $validate = array(
        'name' => array(
            'rule' => 'notBlank',
            'message' => 'Nome do item em branco'
        ),
        'description' => array(
            'rule' => 'notBlank',
            'message' => 'Uma descrição é necessária para o item'
        ),
        'quantity' => array(
            'qntyRule1' => array(
                'rule' => 'notBlank',
                'message' => 'Quantidade de Itens vazia'
            ),
            'qntyRule2' => array(
                'rule' => 'naturalNumber',
                'message' => 'Dados inválidos no campo de quantidade'
            )
        ),
    );
}