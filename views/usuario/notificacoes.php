
<?php

foreach ($usuarios as $usuario) {
    ?>
    <table class="table col-xs-12">
        <tbody>
            <tr>
                <td style="width: 120px" rowspan="2" ><img src="storage/imagens/users/<?php echo $usuario->getImagem(); ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="max-height: 100px; max-width: 100px"></td>
                <td style="width: 150px"><a href="#"><?php echo $usuario->getNome(); ?></a></td>
                <td><?php echo $usuario->getUsuario(); ?></td>
            </tr>
            <tr>
                <td><a href="?controller=usuario&action=aceitarAmizade&id=<?php echo base64_encode($usuario->getId())?>" class="btn btn-block btn-info">Aceitar</a></td>
                <td><a href="?controller=usuario&action=removerAmizade&id=<?php echo base64_encode($usuario->getId())?>" class="btn btn-block btn-default">Recusar</a></td>
            </tr>
        </tbody>
    </table>

<?php } ?>
