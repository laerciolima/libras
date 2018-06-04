<?php




if ($usuario_logado['perfil'] != 'admin') {
    
    $modulo_liberado = 1;
    ?>


<h1 class="text-center">Módulos</h1>
<div class="row">


    <?php foreach ($modulos as $modulo) {?>

    <div class="col-sm-6">

        <div class="panel panel-<?php $modulo_liberado >= 0.7 ? 'success' : 'default'?>">
            <div class="panel-heading">
                <?php echo $modulo->getNome(); ?>
            </div>
            <div class="panel-body">
                <?php echo $modulo->getDescricao(); ?>
            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                        style="width:<?php echo $modulo->getQntdSinaisAprendidos() * 100 / $modulo->getQntdSinais(); ?>%">
                        <?php echo $modulo->getQntdSinaisAprendidos() . "/" . $modulo->getQntdSinais(); ?>
                    </div>
                </div>
                <div class="row">
                    <?php if($modulo_liberado >= 0.7) {?>
                    <button type="button" class="btn btn-default col-sm-7" onclick="location.href = '?controller=categoria&action=lista&modulo=<?php echo $modulo->getId(); ?>'">
                        <span class="glyphicon glyphicon-play"></span> Praticar</button>


                    <button type="button" class="btn btn-default  col-sm-4 col-md-offset-1" onclick="location.href = '?controller=atividade&action=lista&modulo=<?php echo $modulo->getId(); ?>'">
                        <span class="glyphicon glyphicon-list"></span> Atividades</button>


                    <?php } ?>
                </div>


            </div>
        </div>
    </div>

    <?php

$modulo_liberado = $modulo->getQntdSinaisAprendidos() / $modulo->getQntdSinais();
}?>


</div>

<?php

} else {?>

<h1 class="text-center">Painel de controle</h1>

<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Módulo</div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=modulo&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=modulo&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>



<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Categorias</div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=categoria&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=categoria&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>



<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Sinais </div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=sinal&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=sinal&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>

<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Atividades</div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=atividade&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=atividade&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>

<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Movimentos </div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=movimento&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=movimento&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>

<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Configurações de mão</div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=configuracaoDeMao&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=configuracaoDeMao&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>



<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Expressões faciais</div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=expressaoFacial&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=expressaoFacial&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>



<div class="col-sm-4">


    <div class="panel panel-info">
        <div class="panel-heading">Gerenciar Pontos de articulação</div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=pontoDeArticulacao&action=add'">
                <span class="glyphicon glyphicon-plus-sign"></span> Novo</button>

            <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=pontoDeArticulacao&action=index'">
                <span class="glyphicon glyphicon-th-list"></span> Listar</button>
        </div>
    </div>
</div>


<?php } ?>