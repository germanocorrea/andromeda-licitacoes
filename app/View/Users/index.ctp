<h1>Usuários Cadastrados</h1>
<?php
if (AuthComponent::user('role') != 'fornecedor')
    echo $this->Html->link('Adicionar Usuário', array(
    'action' => 'add'
));
?>
<h2>Gerentes</h2>
<ul>
    <?php foreach($users as $user): ?>
        <?php
        if ($user['User']['role'] == 'gerente')
        {
            echo '<li>' . $this->Html->link($user['User']['name'], array(
                    'action' => 'view',
                    $user['User']['id']
                )) . '</li>';
            $exists_gerente = true;
        }
        ?>
    <?php endforeach; ?>
</ul>
<?php
if (!isset($exists_gerente))
    echo $this->Flash->render('Não há Gerentes cadastrados');
?>

<h2>Funcionários</h2>
<ul>
    <?php foreach($users as $user): ?>
        <?php
            if ($user['User']['role'] == 'funcionario')
            {
                echo '<li>' . $this->Html->link($user['User']['name'], array(
                        'action' => 'view',
                        $user['User']['id']
                    )) . '</li>';
                $exists_funcionario = true;
            }
        ?>
    <?php endforeach; ?>
</ul>
<?php
if (!isset($exists_funcionario))
    echo $this->Flash->render('Não há Funcionários cadastrados');
?>

<h2>Fornecedores</h2>
<ul>
    <?php foreach($users as $user): ?>
        <?php
        if ($user['User']['role'] == 'fornecedor')
        {
            echo '<li>' . $this->Html->link($user['User']['name'], array(
                    'action' => 'view',
                    $user['User']['id']
                )) . '</li>';
            $exists_fornecedor = true;
        }
        ?>
    <?php endforeach; ?>
</ul>
<?php
if (!isset($exists_fornecedor))
    echo $this->Flash->render('Não há Fornecedores cadastrados');

echo $this->Flash->render('cu', array(
    'element' => 'success'
));