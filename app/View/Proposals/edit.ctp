<h1>Editar Valores Unitários para cada Item da Licitação <?php echo $licitation['Licitation']['name'] ?></h1>
<?php
echo $this->Form->create('Proposal');

echo $this->Form->input('Proposal.licitation_id', array(
    'type' => 'hidden'
));

echo $this->Form->input('Proposal.user_id', array(
    'type' => 'hidden'
));

?>
<?php foreach ($licitation['LicitationItem'] as $i => $item): ?>
    <fieldset>
        <legend><?php
            echo $this->Html->link($item['name'] . ' - ' . $item['quantity'] . ' unidades',
                array(
                    'controller' => 'licitation_items',
                    'action' => 'view',
                    $item['id']
                ), array('target' => '_blank'));
            ?></legend>
        <?php echo $this->Form->input('ProposalItem.'. $i .'.unity_value', array(
            'label' => 'Valor Unitário de ' . $item['name'] . ' (em Reais)',
            'type' => 'number'
        )); ?>
        <?php echo $this->Form->input('ProposalItem.'. $i .'.licitation_item_id', array(
            'value' => $item['id'],
            'type' => 'hidden'
        )); ?>
        <?php echo $this->Form->input('ProposalItem.'. $i .'.id', array(
            'value' => $licitation['ProposalItem'][$i]['id'],
            'type' => 'hidden'
        )); ?>
    </fieldset>
<?php endforeach;

echo $this->Form->input('Licitation.id', array(
    'value' => $licitation['Licitation']['id'],
    'type' => 'hidden'
));

echo $this->Form->end('Salvar');