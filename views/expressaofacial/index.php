<button  onclick="location.href='?controller=expressaoFacial&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de ExpressoesFaciais</h2>
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
        <?php foreach ($expressoesfaciais as $expressaofacial) { ?>
            <tr>
                <td><?php echo $expressaofacial->getId();?> </td>                <td><a href="?controller=expressaofacial&action=view&id=<?php echo $expressaofacial->getId();?>"><?php echo $expressaofacial->getNome(); ?></a></td>
                <td><?php echo $expressaofacial->getImagem(); ?></td>
                <td><button type="button" onclick="location.href='?controller=expressaoFacial&action=edit&id=<?php echo base64_encode($expressaofacial->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=expressaoFacial&action=delete&id=<?php echo base64_encode($expressaofacial->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>