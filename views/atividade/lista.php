<h1 class="text-center">Atividades</h1>
<div class="row">
<?php if (empty($atividades)) {?>
<h3 class="text-center">Não há atividades neste módulo</h3>
<?php }?>
 <?php foreach ($atividades as $atividade) {?>
        <div class="col-sm-4">


            <div class="panel panel-<?php echo (($atividade->getPontuacao()) ? 'info' : 'default'); ?>">
                <div class="panel-heading"><?php echo $atividade->getTitulo(); ?></div>
                <div class="panel-body">
                    <?php echo $atividade->getDescricao(); ?>

                </div>
                <div class="panel-footer">
                    Pontuação: <?php echo $atividade->getPontuacao() ?>
                    <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=atividade&action=play&id=<?php echo $atividade->getId(); ?>&modulo=<?php echo $_GET['modulo']; ?>'"><span class="glyphicon glyphicon-play"></span> Praticar</button>

                </div>
            </div>
        </div>



        <?php
}
?>


    </div>
