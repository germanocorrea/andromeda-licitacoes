<?php


class User extends AppModel
{
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Um nome de usuário é necessário'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Uma senha é necessário'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Uma email é necessário'
            ),
//            TODO: validar como email
        ),
        'address' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Uma endereço é necessário'
            ),
//            TODO: validar endereço
        ),
        'cpf_cnpj' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Uma CPF/CNPJ é necessário'
            ),
//            TODO: validar cpf/cnpj
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('gerente', 'funcionario', 'fornecedor')),
                'message' => 'Papel de usuário inválido',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}