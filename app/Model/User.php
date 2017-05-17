<?php


class User extends AppModel
{
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Um nome para o usuário é necessário'
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
            'email' => array(
                'rule' => array('email', false),
                'message' => 'Forneça um email válido'
            )
        ),
        'address' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Uma endereço é necessário'
            ),
        ),
        'cpf_cnpj' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Uma CPF/CNPJ é necessário'
            ),
            'cpfcnpj' => array(
                'rule' => 'cpfcnpj',
                'message' => 'Forneça um CPF ou CNPJ válido'
            )
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

    public function cpfcnpj($check)
    {
        $check = $check['cpf_cnpj'];
        $check = preg_replace('@[.\-\\\/]@', '', $check);
        if (strlen($check) == 11)
        {
            $cpf = $check;
            for ($t = 9; $t < 11; $t++)
            {
                for ($d = 0, $c = 0; $c < $t; $c++)
                {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d)
                    return false;
            }
            return true;
        }
        elseif (strlen($check) == 14)
        {
            $cnpj = $check;
            $original_cnpj = $cnpj;
            $cnpj = substr( $cnpj, 0, 12 );

            $sum = 0;
            $pos = 5;

            for ($i = 0; $i < strlen($cnpj); $i++)
            {
                $sum += ($cnpj[$i] * $pos);
                $pos--;
                if ($pos < 2)
                    $pos = 9;
            }

            $first_digit = ($sum % 11 < 2) ? 0 : 11 - ($sum % 11);

            $cnpj .= $first_digit;


            $pos = 6;
            $sum2 = 0;

            for ($i = 0; $i < strlen($cnpj); $i++)
            {
                $sum2 += ($cnpj[$i] * $pos);
                $pos--;
                if ($pos < 2)
                    $pos = 9;
            }

            $scnd_digit = ($sum2 % 11 < 2) ? 0 : 11 - ($sum2 % 11);

            $cnpj .= $scnd_digit;

            if ($cnpj == $original_cnpj)
                return true;
            else return false;

        }
        else return false;
    }
}