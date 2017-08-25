<button  onclick="location.href='?controller=avaliacao&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Avaliacoes</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Nota configuracao_mao</th>
            <th>Nota expressao facial</th>
            <th>Nota media</th>
            <th>Nota movimento</th>
            <th> Nota orientacao</th>
            <th>Nota ponto articulacao</th>
            <th>Fk id gravacao</th>
            <th>Fk id usuario</th>
            <th>Nota final</th>
            <th>Observacoes</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Nota configuracao_mao</th>
            <th>Nota expressao facial</th>
            <th>Nota media</th>
            <th>Nota movimento</th>
            <th> Nota orientacao</th>
            <th>Nota ponto articulacao</th>
            <th>Fk id gravacao</th>
            <th>Fk id usuario</th>
            <th>Nota final</th>
            <th>Observacoes</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($avaliacoes as $avaliacao) { ?>
            <tr>
                <td><?php echo $avaliacao->getId();?> </td>                <td><a href="?controller=avaliacao&action=view&id=<?php echo $avaliacao->getId();?>"><?php echo $avaliacao->getData(); ?></a></td>
                <td><?php echo $avaliacao->getNota_configuracao_mao(); ?></td>
                <td><?php echo $avaliacao->getNota_expressao_facial(); ?></td>
                <td><?php echo $avaliacao->getNota_media(); ?></td>
                <td><?php echo $avaliacao->getNota_movimento(); ?></td>
                <td><?php echo $avaliacao->getNota_orientacao(); ?></td>
                <td><?php echo $avaliacao->getNota_ponto_articulacao(); ?></td>
                <td><?php echo $avaliacao->getFk_id_gravacao(); ?></td>
                <td><?php echo $avaliacao->getFk_id_usuario(); ?></td>
                <td><?php echo $avaliacao->getNota_final(); ?></td>
                <td><?php echo $avaliacao->getObservacoes(); ?></td>
                <td><button type="button" onclick="location.href='?controller=avaliacao&action=edit&id=<?php echo base64_encode($avaliacao->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=avaliacao&action=delete&id=<?php echo base64_encode($avaliacao->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>