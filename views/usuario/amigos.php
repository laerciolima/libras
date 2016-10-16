<h1 class="text-center">Amigos</h1>
<div class="col-lg-6">
    <form action="?controller=usuario&action=buscarUsuario">
    <div class="input-group">
        
        <input type="hidden" name="controller" value="usuario">
        <input type="hidden" name="action" value="buscarUsuario">
        <input type="text" name="busca" class="form-control" placeholder="Encontre amigos...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Go!</button>
        </span>
    </div><!-- /input-group -->
    </form>
</div><!-- /.col-lg-6 --> 

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
                <td><?php echo $usuario->getNivel(); ?></td>
                <td><div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100" style="width:65%">
                            <?php echo $usuario->getPontuacao(); ?>pts
                        </div>

                    </div></td>
            </tr>
        </tbody>
    </table>

<?php } ?>
