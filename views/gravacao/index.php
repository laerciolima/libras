<button  onclick="location.href='?controller=gravacao&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Gravacoes</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Total de avaliações</th>
            <th>data</th>
            <th>Sinal</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Total de avaliações</th>
            <th>data</th>
            <th>Sinal</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($gravacoes as $gravacao) { ?>
            <tr>
                <td><?php echo $gravacao->getQntdAv(); ?></td>
                <td><a href="?controller=gravacao&action=view&id=<?php echo $gravacao->getId();?>"><?php echo date('d/m/Y', strtotime($gravacao->getData())); ?></a></td>
                <td><?php echo $gravacao->getFk_id_sinal(); ?></td>

                <td><button type="button" onclick="javascript:remover('?controller=gravacao&action=delete&id=<?php echo base64_encode($gravacao->getId());?>');" class="btn btn-danger btn-xs">Remover</button>

                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>
