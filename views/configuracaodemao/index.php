<button  onclick="location.href='?controller=configuracaoDeMao&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Configurações de mão</h2>
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
        <?php foreach ($configuracoesdemaos as $configuracaodemao) { ?>
            <tr>
                <td><?php echo $configuracaodemao->getId();?> </td>                <td><a href="?controller=configuracaodemao&action=view&id=<?php echo $configuracaodemao->getId();?>"><?php echo $configuracaodemao->getNome(); ?></a></td>
                <td><img src="/libras/storage/imagens/configuracao_de_mao/<?php echo $configuracaodemao->getImagem(); ?>" width=32 /></td>
                <td><button type="button" onclick="location.href='?controller=configuracaoDeMao&action=edit&id=<?php echo base64_encode($configuracaodemao->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=configuracaoDeMao&action=delete&id=<?php echo base64_encode($configuracaodemao->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>