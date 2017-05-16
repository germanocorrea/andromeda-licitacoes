<h1>Licitações Cadastradas</h1>

<?php if (AuthComponent::user('role') != 'fornecedor')
    echo $this->Html->link('Adicionar Licitação', array(
        'controller' => 'licitations',
        'action' => 'add'
    ));
?>

<?php if (isset($licitations)): ?>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data de Abertura</th>
            <th>Data de Fechamento</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($licitations as $licitation): ?>
            <tr>
                <td><?php echo $this->Html->link($licitation['Licitation']['name'], array(
                        'controller' => 'licitations',
                        'action' => 'view',
                        $licitation['Licitation']['id']
                    )); ?></td>
                <td><?php echo $licitation['Licitation']['open_date']; ?></td>
                <td><?php echo $licitation['Licitation']['end_date']; ?></td>
                <td><?php echo $licitation['Licitation']['state']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>