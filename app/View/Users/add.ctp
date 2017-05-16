<!-- app/View/Users/add.ctp -->
<div class="users form">
    <?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Adicionar Usuário'); ?></legend>

        <?php echo $this->Form->input('name');

//        TODO: complementar tudo isso
        echo $this->Form->input('password');

        echo $this->Form->input('cpf_cnpj');

        echo $this->Form->input('address');

        echo $this->Form->input('email');

        $user_roles = array(
            'funcionario' => 'Funcionário',
            'fornecedor' => 'Fornecedor'
        );
        if (AuthComponent::user('role') == 'gerente')
            $user_roles['gerente'] = 'Gerente';

        echo $this->Form->input('role', array(
            'options' => $user_roles
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar'));?>
</div>