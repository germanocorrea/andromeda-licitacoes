<h1>Itens da Licitação</h1>

<?php
echo $this->Html->link('Adicionar Item', array(
    'controller' => 'licitation_items',
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
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo $this->Html->link(
                        $item['LicitationItem']['name'],
                        array(
                            'controller' => 'licitation_items',
                            'action' => 'view',
                            $licitation_id,
                            $item['LicitationItem']['id']
                        )
                    ); ?></td>
                <td><?php echo $item['LicitationItem']['quantity']; ?></td>
                <td><?php echo $item['LicitationItem']['description']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>