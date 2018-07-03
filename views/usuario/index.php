<button  onclick="location.href='?controller=usuario&action=add'" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    Novo
                </button><h2>Lista de Usuarios</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>usuario</th>
            <th>Senha</th>
            <th>Nivel</th>
            <th>Pontuacao</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>usuario</th>
            <th>Senha</th>
            <th>Nivel</th>
            <th>Pontuacao</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario->getId();?> </td>                <td><a href="?controller=usuario&action=view&id=<?php echo $usuario->getId();?>"><?php echo $usuario->getNome(); ?></a></td>
                <td><?php echo $usuario->getEmail(); ?></td>
                <td><?php echo $usuario->getPerfil(); ?></td>
                <td><?php echo $usuario->getusuario(); ?></td>
                <td><?php echo $usuario->getSenha(); ?></td>
                <td><?php echo $usuario->getNivel(); ?></td>
                <td><?php echo $usuario->getPontuacao(); ?></td>
                <td><?php echo $usuario->getImagem(); ?></td>
                <td><button type="button" onclick="location.href='?controller=usuario&action=edit&id=<?php echo base64_encode($usuario->getId());?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=usuario&action=delete&id=<?php echo base64_encode($usuario->getId());?>');" class="btn btn-danger btn-xs">Remover</button>
                    
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>