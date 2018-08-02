<div class="container">
	<div class="row">
    <table class="table col-xs-12">
        <tbody>
            <tr>
                <td style="width: 120px" rowspan="2" ><img src="storage/imagens/users/<?php echo $usuario->getImagem(); ?>" class="img-responsive center-block rounded img-circle" alt="Cinque Terre" style="max-height: 100px; max-width: 100px"></td>
                <td style="width: 150px"><a href="#"><?php echo $usuario->getNome(); ?></a></td>
                <td><?php echo $usuario->getUsuario(); ?></td>
            </tr>
            <tr>
                <td><div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90"
                             aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($usuario->getPontuacao()*100) / $_SESSION['total_sinais_cadastrados']  ?>%">
                            <?php echo $usuario->getPontuacao()."/".$_SESSION['total_sinais_cadastrados']; ?>
                        </div>

                    </div> </td>

                    <?php if (!$usuario->isAmigo()) { ?>
                    <td><button type="button" id="solicitarAmizade<?php echo $usuario->getId();?>" onclick="solicitarAmizade(<?php echo $usuario->getId();?>)" class="btn btn-xs btn-link glyphicon glyphicon-plus-sign"> add</button></td>

                    <?php } ?>
            </tr>
        </tbody>
    </table>
	</div>
</div>