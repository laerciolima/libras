<button  onclick="location.href = '?controller=estudante&action=add'" type="button" class="btn btn-primary btn-sm" style="margin-top: 5px">
    Novo
</button><h2>Lista de Estudantes</h2>
<table id="example" class="display compact" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Telefone</th>
            <th>Universidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Telefone</th>
            <th>Universidade</th>
            <th>Ações</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($estudantes as $estudante) { ?>
            <tr>
                <td><?php echo $estudante->getId(); ?></td>
                <td><a href="?controller=estudante&action=view&id=<?php echo $estudante->getId(); ?>"><?php echo $estudante->getNome(); ?></a></td>
                <td><?php echo $estudante->getCpf(); ?></td>
                <td><?php echo $estudante->getTelefone(); ?></td>
                <td><?php echo $estudante->getFk_id_universidade(); ?></td>
                <td><button type="button" onclick="location.href = '?controller=estudante&action=edit&id=<?php echo base64_encode($estudante->getId()); ?>';" class="btn btn-default btn-xs">Editar</button>
                    <button type="button" onclick="javascript:remover('?controller=estudante&action=delete&id=<?php echo base64_encode($estudante->getId()); ?>');" class="btn btn-danger btn-xs">Remover</button>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>