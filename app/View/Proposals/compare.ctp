<h1>Comparação de Propostas da Licitação <?php echo $data[0]['Licitation']['name']; ?></h1>

<table id="propostas">
    <thead>
        <tr>
            <th>Fornecedor</th>
            <?php foreach ($items as $item): ?>
                <th><?php
                    echo $item['LicitationItem']['name']
                    ?> (unidade)</th>
            <?php endforeach; ?>
            <?php foreach ($items as $item): ?>
                <th><?php
                    echo $item['LicitationItem']['name']
                    ?> (total)</th>
            <?php endforeach; ?>
            <th>Preço Final Total</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $proposal): ?>
        <tr>
            <td><b><?php echo $proposal['User']['name']; ?></b></td>

            <?php foreach ($proposal['ProposalItem'] as $item): ?>
            <td>R$ <?php echo $item['unity_value']; ?></td>
            <?php endforeach; ?>

            <?php foreach ($proposal['ProposalItem'] as $item): ?>
            <td>R$ <?php echo $item['unity_value'] * $item['LicitationItem']['quantity']; ?></td>
            <?php endforeach; ?>

            <td>R$ <?php
                $total = 0;
                foreach ($proposal['ProposalItem'] as $prop)
                    $total += $prop['unity_value'] * $prop['LicitationItem']['quantity'];
                echo $total
                ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>