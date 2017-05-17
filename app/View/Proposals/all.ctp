<?php if (isset($proposals)): ?>
    <?php if (AuthComponent::user('role') == 'fornecedor')
        if ($proposals[0]['Licitation']['state'] == 'ABERTA')
            echo $this->Html->link(
                'Adicionar Proposta',
                array(
                    'controller' => 'proposals',
                    'action' => 'add',
                    $licitation_id
                ));
    ?>
    <h1>Propostas da Licitação <?php echo $proposals[0]['Licitation']['name']; ?></h1>
    <?php
    if (AuthComponent::user('role') == 'gerente')
        echo $this->Html->link('Comparar Propostas', array(
            'controller' => 'proposals',
            'action' => 'compare',
            $licitation_id
        ));
    ?>
    <br>
    <br>
    <ul>
    <?php foreach ($proposals as $proposal): ?>
        <li><?php if ($proposal['Proposal']['choosed'] != null && $proposal['Proposal']['choosed'] == true)
            echo '<b>PROPOSTA ESCOLHIDA:</b> ';
        echo $this->Html->link('Proposta Nº ' .
            $proposal['Proposal']['id'] . ' de ' .
            $proposal['User']['name'], array(
                'action' => 'view',
                $proposal['Proposal']['id']
            )); ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>