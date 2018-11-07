<h1 class="text-center">Categorias</h1>
<div class="row">
<?php if(empty($categorias)){ ?>
<h3 class="text-center">Não há categorias neste módulo</h3>
<?php }
$categoria_liberada = 1; ?>
 <?php foreach ($categorias as $categoria) { ?>
        <div class="col-sm-6">


           <div class="panel panel-<?php echo ($categoria_liberada >= 0.7) ? "info" : "default mod_desabilitado"?>">
                <div class="panel-heading"><?php echo $categoria->getNome(); ?></div>
                <div class="panel-body">
                    <?php echo $categoria->getDescricao(); ?>

                </div>
                <div class="panel-footer">
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $categoria->getQntdSinaisAprendidos()*100 /$categoria->getQntdSinais(); ?>%">
                            <?php echo $categoria->getQntdSinaisAprendidos()."/".$categoria->getQntdSinais(); ?> 
                            
                        </div>
                    </div>
                    <button <?php echo ($categoria_liberada >= 0.7) ? "" : "disabled"; ?> type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=gravacao&action=play&categoria=<?php echo $categoria->getId(); ?>'"><span class="glyphicon glyphicon-play"></span> Praticar</button>

                </div>
            </div>
        </div>



        <?php

$categoria_liberada = $categoria->getQntdSinaisAprendidos() / $categoria->getQntdSinais();
    }
    ?>


    </div>
