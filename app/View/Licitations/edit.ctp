<h1>Editar Licitação</h1>

<?php
echo $this->Form->create('Licitation');

echo $this->Form->input('id', array(
    'type' => 'hidden'
));

echo $this->Form->input('name');

echo $this->Form->input('open_date', array(
    'label' => 'Data de Abertura',
    'dateFormat' => 'DMY'
));

echo $this->Form->input('end_date', array(
    'label' => 'Data de Encerramento',
    'dateFormat' => 'DMY'
));

// TODO: licitação abre automaticamente no dia informado
// TODO: licitação finaliza automaticamente na data informada
// TODO: licitação homologa automaticamente qnd proposta é escolhida
//echo $this->Form->input('state', array(
//    'type' => 'select',
//    'options' => array(
//        'CRIADA' => 'CRIADA',
//        'ABERTO' => 'ABERTO',
//        'FINALIZADA' => 'FINALIZADA',
//        'HOMOLOGADA' => 'HOMOLOGADA'
//    )
//));

echo $this->Form->end('Salvar');
?>