<button  onclick="location.href='?controller=badgeusuario&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Badge_Usuarios</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fk_id_usuario</th>
            <th>Fk_id_badge</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Fk_id_usuario</th>
            <th>Fk_id_badge</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($badge_usuarios as $badgeusuario) { ?>
            <tr>
                <td><?php echo $badgeusuario->getId();?> </td>                <td><a href="?controller=badgeusuario&action=view&id=<?php echo $badgeusuario->getId();?>"><?php echo $badgeusuario->getFk_id_usuario(); ?></a></td>
                <td><?php echo $badgeusuario->getFk_id_badge(); ?></td>
                <td><?php echo $badgeusuario->getData(); ?></td>
                <td><button type="button" onclick="location.href='?controller=badgeusuario&action=edit&id=<?php echo base64_encode($badgeusuario->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=badgeusuario&action=delete&id=<?php echo base64_encode($badgeusuario->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>