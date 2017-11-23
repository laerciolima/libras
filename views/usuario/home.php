<h1 class="text-center">Módulos</h1>
<div class="row">

    <?php foreach ($modulos as $modulo) { ?>
        <div class="col-sm-6">


            <div class="panel panel-success">
                <div class="panel-heading"><?php echo $modulo->getNome(); ?></div>
                <div class="panel-body">
                    <?php echo $modulo->getDescricao(); ?>
                </div>
                <div class="panel-footer">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $modulo->getQntdSinaisAprendidos()*100 /$modulo->getQntdSinais(); ?>%">
                            <?php echo $modulo->getQntdSinaisAprendidos()."/".$modulo->getQntdSinais(); ?> 
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=categoria&action=lista&modulo=<?php echo $modulo->getId(); ?>'"><span class="glyphicon glyphicon-play"></span> Praticar</button>

                </div>
            </div>
        </div>
        <?php
    }
    ?>
