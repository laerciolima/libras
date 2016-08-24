<h2>Lista de Usuarios</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">


    <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario->getId(); ?></td>
                <td><a href="?controller=usuario&action=view&id=<?php echo $usuario->getId(); ?>"><?php echo $usuario->getLogin(); ?></a></td>
                <td><?php echo $usuario->getSenha(); ?></td>
                <td><button type="button" onclick="location.href = '?controller=usuario&action=edit&id=<?php echo base64_encode($usuario->getId()); ?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=usuario&action=delete&id=<?php echo base64_encode($usuario->getId()); ?>');" class="btn btn-danger btn-xs">Remover</button>

                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>

