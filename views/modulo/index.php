<button  onclick="location.href='?controller=modulo&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Módulos</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Ordem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Ordem</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($modulos as $modulo) { ?>
            <tr>
                <td><?php echo $modulo->getId();?> </td>                <td><a href="?controller=modulo&action=view&id=<?php echo $modulo->getId();?>"><?php echo $modulo->getNome(); ?></a></td>
                <td><?php echo $modulo->getDescricao(); ?></td>
                <td><?php echo $modulo->getNivel(); ?></td>
                <td><button type="button" onclick="location.href='?controller=modulo&action=edit&id=<?php echo base64_encode($modulo->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=modulo&action=delete&id=<?php echo base64_encode($modulo->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>