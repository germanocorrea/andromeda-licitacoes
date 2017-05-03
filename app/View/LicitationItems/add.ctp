<?php

echo $this->Form->create('LicitationItem');

echo $this->Form->input('licitation_id', array(
    'type' => 'hidden',
    'value' => $licitation_id
));

echo $this->Form->input('name', array(
    'label' => 'Nome'
));

echo $this->Form->input('description', array(
    'label' => 'Descrição'
));

echo $this->Form->input('quantity', array(
    'label' => 'Quantidade'
));

echo $this->Form->end('Salvar');
