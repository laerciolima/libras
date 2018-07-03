<button  onclick="location.href='?controller=categoria&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Categorias</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Imagem</th>
            <th>Fk_id_modulo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Imagem</th>
            <th>Fk_id_modulo</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($categorias as $categoria) { ?>
            <tr>
                <td><?php echo $categoria->getId();?> </td>                <td><a href="?controller=categoria&action=view&id=<?php echo $categoria->getId();?>"><?php echo $categoria->getNome(); ?></a></td>
                <td><?php echo $categoria->getDescricao(); ?></td>
                <td><?php echo $categoria->getImagem(); ?></td>
                <td><?php echo $categoria->getFk_id_modulo(); ?></td>
                <td><button type="button" onclick="location.href='?controller=categoria&action=edit&id=<?php echo base64_encode($categoria->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=categoria&action=delete&id=<?php echo base64_encode($categoria->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>