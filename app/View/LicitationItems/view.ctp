<h1><?php echo $item['LicitationItem']['name']; ?> - <?php echo $licitation['Licitation']['name']; ?></h1>

<ul>
    <li><?php echo $this->Html->link('Editar Item', array(
            'controller' => 'licitationitems',
            'action' => 'edit',
            $licitation['Licitation']['id'],
            $item['LicitationItem']['id']
        ));
        ?></li>
    <li><?php echo $this->Html->link('Deletar Item', array(
            'controller' => 'licitationitems',
            'action' => 'delete',
            $licitation['Licitation']['id'],
            $item['LicitationItem']['id']
        ));
        ?></li>
    <li>Licitação: <?php echo $this->Html->link($licitation['Licitation']['name'], array(
            'controller' => 'licitations',
            'action' => 'view',
            $licitation['Licitation']['id']
        ));
        ?></li>
    <li>Quantidade: <?php echo $item['LicitationItem']['quantity']; ?></li>
</ul>
<br>
<p><b>Descrição: </b><?php echo $item['LicitationItem']['description']; ?></p>