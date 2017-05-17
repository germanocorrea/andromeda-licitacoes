<h1>Editar Licitação</h1>

<?php
echo $this->Form->create('Licitation');

echo $this->Form->input('id', array(
    'type' => 'hidden'
));

echo $this->Form->input('name', array(
        'label' => 'Nome'
));

echo $this->Form->input('open_date', array(
    'label' => 'Data de Abertura',
    'dateFormat' => 'DMY'
));

echo $this->Form->input('end_date', array(
    'label' => 'Data de Encerramento',
    'dateFormat' => 'DMY'
));

echo $this->Form->input('state', array(
    'type' => 'hidden'
));

echo $this->Form->end('Salvar');
?>