<h1><?php echo $licitation['Licitation']['name']; ?></h1>

<ul>
    <li>Data de Abertura: <?php echo $licitation['Licitation']['open_date']; ?></li>
    <li>Data de Fechamento: <?php echo $licitation['Licitation']['end_date']; ?></li>
    <li>Estado: <?php echo $licitation['Licitation']['state']; ?></li>
    <li><?php echo $this->Html->link('Visualizar Itens da Licitação', array(
        'controller' => 'LicitationItens', // TODO: criar essa controladora
        'action' => 'list',
        $licitation['Licitation']['id']
    ));?></li>
    <li><?php echo $this->Html->link('Editar Licitação', array(
            'controller' => 'licitations',
            'action' => 'edit',
            $licitation['Licitation']['id']
        ));?></li>
</ul>