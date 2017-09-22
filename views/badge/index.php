<button  onclick="location.href='?controller=badge&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Badges</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descricao</th>
            <th>Img</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Descricao</th>
            <th>Img</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($badges as $badge) { ?>
            <tr>
                <td><?php echo $badge->getId();?> </td>                <td><a href="?controller=badge&action=view&id=<?php echo $badge->getId();?>"><?php echo $badge->getDescricao(); ?></a></td>
                <td><?php echo $badge->getImg(); ?></td>
                <td><button type="button" onclick="location.href='?controller=badge&action=edit&id=<?php echo base64_encode($badge->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=badge&action=delete&id=<?php echo base64_encode($badge->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>