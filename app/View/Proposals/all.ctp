<?php if (AuthComponent::user('role') == 'fornecedor')
    if (isset($proposals[0]))
        $state = $proposals[0]['Licitation']['state'];
    else $state = $proposals['Licitation']['state'];
    if ($state == 'ABERTA')
        echo $this->Html->link(
            'Adicionar Proposta',
            array(
                'controller' => 'proposals',
                'action' => 'add',
                $licitation_id
            ));
?>
<?php if (isset($proposals) && !empty($proposals[0])): ?>
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