<button  onclick="location.href='?controller=gravacao&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Gravacoes</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>data</th>
            <th>Video</th>
            <th>Fk id sinal</th>
            <th>Fk id usuario</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>data</th>
            <th>Video</th>
            <th>Fk id sinal</th>
            <th>Fk id usuario</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($gravacoes as $gravacao) { ?>
            <tr>
                <td><?php echo $gravacao->getId();?> </td>                <td><a href="?controller=gravacao&action=view&id=<?php echo $gravacao->getId();?>"><?php echo $gravacao->getdata(); ?></a></td>
                <td><?php echo $gravacao->getVideo(); ?></td>
                <td><?php echo $gravacao->getFk_id_sinal(); ?></td>
                <td><?php echo $gravacao->getFk_id_usuario(); ?></td>
                <td><button type="button" onclick="location.href='?controller=gravacao&action=edit&id=<?php echo base64_encode($gravacao->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=gravacao&action=delete&id=<?php echo base64_encode($gravacao->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>