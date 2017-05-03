<h1>Itens da Licitação</h1>

<?php
echo $this->Html->link('Adicionar Item', array(
    'controller' => 'licitationitems',
    'action' => 'add',
    $licitation_id
));
?>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Descrição</th>
        </tr>
    </thead>
</table>