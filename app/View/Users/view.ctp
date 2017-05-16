<h1>Usuário <?php echo $user['User']['name']; ?></h1>

<ul>
    <li><b>ID</b>: <?php echo $user['User']['id']; ?></li>
    <li><b><?php echo ($user['User']['role'] != 'fornecedor' ? 'CPF' : 'CPF/CNPJ')
        ?></b>: <?php echo $user['User']['cpf_cnpj']; ?></li>
    <li><b>Nome</b>: <?php echo $user['User']['name']; ?></li>
    <li><b>Email</b>: <?php echo $user['User']['email']; ?></li>
    <li><b>Endereço</b>: <?php echo $user['User']['address']; ?></li>
    <li><b>Tipo de Usuário</b>: <?php echo ucfirst($user['User']['role']); ?></li>
</ul>

<ul>
    <li><?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id'])) ?></li>
    <li><?php echo $this->Form->postLink('Deletar', array(
        'action' => 'edit', $user['User']['id']
        ), array('confirm' => 'Você tem certeza?'))
    ?></li>
</ul>