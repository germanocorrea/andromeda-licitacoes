<h1><?php echo $item['LicitationItem']['name']; ?> - <?php echo $licitation['Licitation']['name']; ?></h1>

<ul>
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