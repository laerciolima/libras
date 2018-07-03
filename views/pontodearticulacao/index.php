<button  onclick="location.href='?controller=pontodearticulacao&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button>
            <br/>
            <br/>
            <h2>Lista de pontos de articulação</h2>
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
        <?php foreach ($pontosdearticulacao as $pontodearticulacao) { ?>
            <tr>
                <td><?php echo $pontodearticulacao->getId();?> </td>                <td><a href="?controller=pontodearticulacao&action=view&id=<?php echo $pontodearticulacao->getId();?>"><?php echo $pontodearticulacao->getNome(); ?></a></td>
                <td><img src="/libras/storage/imagens/ponto_de_articulacao/<?php echo $pontodearticulacao->getImagem(); ?>" width=32 /></td>
                <td><button type="button" onclick="location.href='?controller=pontoDeArticulacao&action=edit&id=<?php echo base64_encode($pontodearticulacao->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=pontoDeArticulacao&action=delete&id=<?php echo base64_encode($pontodearticulacao->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>