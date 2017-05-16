<?php if (AuthComponent::user('role') == 'fornecedor')
echo $this->Html->link(
        'Adicionar Proposta',
        array(
            'controller' => 'proposals',
            'action' => 'add',
            $licitation_id
        )
); ?>
<?php if (isset($proposals)): ?>
    <h1>Propostas da Licitação <?php echo $proposals[0]['Licitation']['name']; ?></h1>
    <ul>
    <?php foreach ($proposals as $proposal): ?>
        <li><?php echo $this->Html->link('Proposta Nº ' .
            $proposal['Proposal']['id'] . ' de ' .
            $proposal['User']['name'], array(
                'action' => 'view',
                $proposal['Proposal']['id']
            )); ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>