<h1><?php echo $item['LicitationItem']['name']; ?> - <?php echo $item['Licitation']['name']; ?></h1>

<ul>
    <?php if (AuthComponent::user('role') != 'fornecedor'): ?>
    <li><?php echo $this->Html->link('Editar Item', array(
            'controller' => 'licitation_items',
            'action' => 'edit',
            $item['LicitationItem']['id']
        ));
    ?></li>
    <?php endif; ?>
    <?php if (AuthComponent::user('role') == 'gerente'): ?>
    <li><?php echo $this->Form->postLink('Deletar Item', array(
            'controller' => 'licitation_items',
            'action' => 'delete',
            $item['Licitation']['id'],
            $item['LicitationItem']['id']
        ), array('confirm' => 'Você tem certeza?'));
    ?></li>
    <?php endif; ?>
    <li>Licitação: <?php echo $this->Html->link($item['Licitation']['name'], array(
            'controller' => 'licitations',
            'action' => 'view',
            $item['Licitation']['id']
        ));
        ?></li>
    <li>Quantidade: <?php echo $item['LicitationItem']['quantity']; ?></li>
</ul>
<br>
<p><b>Descrição: </b><?php echo $item['LicitationItem']['description']; ?></p>