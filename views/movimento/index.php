<button  onclick="location.href='?controller=movimento&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Movimentos</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($movimentos as $movimento) { ?>
            <tr>
                <td><?php echo $movimento->getId();?> </td>                <td><a href="?controller=movimento&action=view&id=<?php echo $movimento->getId();?>"><?php echo $movimento->getNome(); ?></a></td>
                <td><?php echo $movimento->getImagem(); ?></td>
                <td><button type="button" onclick="location.href='?controller=movimento&action=edit&id=<?php echo base64_encode($movimento->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=movimento&action=delete&id=<?php echo base64_encode($movimento->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>