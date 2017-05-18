<h1>Proposta Nº <?php echo $proposal['Proposal']['id']; ?></h1>
<ul>
    <li><b>Autor:</b> <?php echo $proposal['User']['name']; ?></li>
    <li><b>Licitação:</b> <?php echo $proposal['Licitation']['name']; ?></li>
    <?php if (AuthComponent::user('role') == 'fornecedor' && AuthComponent::user('id') == $proposal['Proposal']['user_id'] &&
        (   $proposal['Licitation']['state'] != 'FECHADA' &&
            $proposal['Licitation']['state'] != 'HOMOLOGADA')): ?>
    <li><?php echo $this->Html->link('Editar', array(
            'action' => 'edit',
            $proposal['Proposal']['id'],
            $proposal['Licitation']['id']
    )); ?></li>
    <li><?php echo $this->Form->postLink('Deletar', array(
            'action' => 'delete',
            $proposal['Proposal']['id'],
            $proposal['Licitation']['id']
    ), array('confirm' => 'Você tem certeza?')); ?></li>
    <?php endif; ?>
</ul>
<table id="proposal">
    <thead>
    <tr>
        <th>Item</th>
        <th>Quantidade</th>
        <th>Valor Unitário</th>
        <th>Valor Total</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($proposal['ProposalItem'] as $p => $proposal_item): ?>
        <tr>
            <td><?php echo $proposal['LicitationItem'][$p]['LicitationItem']['name']; ?></td>
            <td><?php echo $proposal['LicitationItem'][$p]['LicitationItem']['quantity']; ?></td>
            <td><?php echo $proposal_item['unity_value']; ?></td>
            <td><?php echo (float) $proposal['LicitationItem'][$p]['LicitationItem']['quantity'] *
                    (float) $proposal_item['unity_value']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#proposal').DataTable();
    });
</script>