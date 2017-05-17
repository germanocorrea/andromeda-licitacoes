<!-- app/View/Users/add.ctp -->
<div class="users form">
    <?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Adicionar Usuário'); ?></legend>

        <?php echo $this->Form->input('name', array(
                'label' => 'Nome'
        ));

        echo $this->Form->input('password', array(
            'label' => 'Senha'
        ));

        echo $this->Form->input('cpf_cnpj', array(
            'label' => 'CPF/CNPJ'
        ));

        echo $this->Form->input('address', array(
            'label' => 'Endereço'
        ));

        echo $this->Form->input('email', array(
            'label' => 'Email'
        ));

        $user_roles = array(
            'funcionario' => 'Funcionário',
            'fornecedor' => 'Fornecedor'
        );
        if (AuthComponent::user('role') == 'gerente')
            $user_roles['gerente'] = 'Gerente';

        echo $this->Form->input('role', array(
            'options' => $user_roles,
            'label' => 'Tipo de Usuário'
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar'));?>
</div>