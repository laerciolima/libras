<button  onclick="location.href='?controller=atividade&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Atividades</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ordem</th>
            <th>Modulo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ordem</th>
            <th>Modulo</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($atividades as $atividade) { ?>
            <tr>
                <td><?php echo $atividade->getId();?> </td>                <td><a href="?controller=atividade&action=view&id=<?php echo $atividade->getId();?>"><?php echo $atividade->getTitulo(); ?></a></td>
                <td><?php echo $atividade->getDescricao(); ?></td>
                <td><?php echo $atividade->getOrdem(); ?></td>
                <td><?php echo ModuloDAO::find($atividade->getFk_id_Modulo())->getNome(); ?></td>
                <td><button type="button" onclick="location.href='?controller=atividade&action=edit&id=<?php echo base64_encode($atividade->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=atividade&action=delete&id=<?php echo base64_encode($atividade->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>