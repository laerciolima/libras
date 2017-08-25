<button  onclick="location.href='?controller=sinal&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Sinais</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Video</th>
            <th>Foto</th>
            <th>Orientacao</th>
            <th>ExpressaoFacial_idExpressaoFacial</th>
            <th>PontoDeArticulacao_idPontoDeArticulacao</th>
            <th>SinalDefinePesoInicial</th>
            <th>Modulo_id</th>
            <th>UtilizacaoDasMaos</th>
            <th>MaoPrincipal_id</th>
            <th>MaoSecundaria_id</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Video</th>
            <th>Foto</th>
            <th>Orientacao</th>
            <th>ExpressaoFacial_idExpressaoFacial</th>
            <th>PontoDeArticulacao_idPontoDeArticulacao</th>
            <th>SinalDefinePesoInicial</th>
            <th>Modulo_id</th>
            <th>UtilizacaoDasMaos</th>
            <th>MaoPrincipal_id</th>
            <th>MaoSecundaria_id</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($sinais as $sinal) { ?>
            <tr>
                <td><?php echo $sinal->getId();?> </td>                <td><a href="?controller=sinal&action=view&id=<?php echo $sinal->getId();?>"><?php echo $sinal->getNome(); ?></a></td>
                <td><?php echo $sinal->getVideo(); ?></td>
                <td><?php echo $sinal->getFoto(); ?></td>
                <td><?php echo $sinal->getOrientacao(); ?></td>
                <td><?php echo $sinal->getExpressaoFacial_idExpressaoFacial(); ?></td>
                <td><?php echo $sinal->getPontoDeArticulacao_idPontoDeArticulacao(); ?></td>
                <td><?php echo $sinal->getSinalDefinePesoInicial(); ?></td>
                <td><?php echo $sinal->getModulo_id(); ?></td>
                <td><?php echo $sinal->getUtilizacaoDasMaos(); ?></td>
                <td><?php echo $sinal->getMaoPrincipal_id(); ?></td>
                <td><?php echo $sinal->getMaoSecundaria_id(); ?></td>
                <td><button type="button" onclick="location.href='?controller=sinal&action=edit&id=<?php echo base64_encode($sinal->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=sinal&action=delete&id=<?php echo base64_encode($sinal->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>