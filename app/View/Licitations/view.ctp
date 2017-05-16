<h1><?php echo $licitation['Licitation']['name']; ?></h1>

<ul>
    <li>Data de Abertura: <?php echo $licitation['Licitation']['open_date']; ?></li>
    <li>Data de Fechamento: <?php echo $licitation['Licitation']['end_date']; ?></li>
    <li>Estado: <?php echo $licitation['Licitation']['state']; ?></li>
    <li><?php echo $this->Html->link('Visualizar Itens da Licitação', array(
        'controller' => 'licitation_items',
        'action' => 'all',
        $licitation['Licitation']['id'],

    ));?></li>
    <?php if (AuthComponent::user('role') != 'fornecedor'): ?>
    <li><?php echo $this->Html->link('Editar Licitação', array(
            'controller' => 'licitations',
            'action' => 'edit',
            $licitation['Licitation']['id']
    ));?></li>
    <?php endif; ?>
    <li><?php echo $this->Html->link('Propostas da Licitação', array(
            'controller' => 'proposals',
            'action' => 'all',
            $licitation['Licitation']['id']
    ));?></li>
    <?php if (AuthComponent::user('role') == 'gerente'): ?>
    <li><?php echo $this->Form->postLink(
        'Deletar',
        array('action' => 'delete', $licitation['Licitation']['id']),
        array('confirm' => 'Você tem certeza?')
    ); ?></li>
    <?php endif; ?>
</ul>