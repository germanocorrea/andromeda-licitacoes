<h1>Itens da Licitação</h1>

<?php
if (AuthComponent::user('role') != 'fornecedor')
    echo $this->Html->link('Adicionar Item', array(
        'controller' => 'licitation_items',
        'action' => 'add',
        $licitation_id
    ));
?>

<?php if (isset($items)): ?>
<table id="licitacoes">
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
                            $item['LicitationItem']['id']
                        )
                    ); ?></td>
                <td><?php echo $item['LicitationItem']['quantity']; ?></td>
                <td><?php echo $item['LicitationItem']['description']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $('#licitacoes').DataTable();
    });
</script>
<?php endif;