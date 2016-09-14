<button  onclick="location.href='?controller=sinal&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Sinais</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fk_id_categoria</th>
            <th>Dificuldade</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Orientacao</th>
            <th>Video</th>
            <th>Fk_id_expressao_facial</th>
            <th>Fk_id_ponto_de_articulacao</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Fk_id_categoria</th>
            <th>Dificuldade</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Orientacao</th>
            <th>Video</th>
            <th>Fk_id_expressao_facial</th>
            <th>Fk_id_ponto_de_articulacao</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($sinais as $sinal) { ?>
            <tr>
                <td><?php echo $sinal->getId();?> </td>                <td><a href="?controller=sinal&action=view&id=<?php echo $sinal->getId();?>"><?php echo $sinal->getFk_id_categoria(); ?></a></td>
                <td><?php echo $sinal->getDificuldade(); ?></td>
                <td><?php echo $sinal->getFoto(); ?></td>
                <td><?php echo $sinal->getNome(); ?></td>
                <td><?php echo $sinal->getOrientacao(); ?></td>
                <td><?php echo $sinal->getVideo(); ?></td>
                <td><?php echo $sinal->getFk_id_expressao_facial(); ?></td>
                <td><?php echo $sinal->getFk_id_ponto_de_articulacao(); ?></td>
                <td><button type="button" onclick="location.href='?controller=sinal&action=edit&id=<?php echo base64_encode($sinal->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=sinal&action=delete&id=<?php echo base64_encode($sinal->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>