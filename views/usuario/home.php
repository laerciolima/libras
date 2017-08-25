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
                             aria-valuemin="0" aria-valuemax="100" style="width:95%">
                            1950pts
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block" onclick="location.href = '?controller=categoria&action=lista&modulo=<?php echo $modulo->getId(); ?>'"><span class="glyphicon glyphicon-play"></span> Praticar</button>

                </div>
            </div>
        </div>
        <?php
    }
    ?>


    <div class="col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">Cores</div>
            <div class="panel-body">
                fadfasdfasdfadfasdf

            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                         aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        1950pts
                    </div>

                </div>


            </div>
        </div>

    </div>


    <div class="col-sm-6">


        <div class="panel panel-success">
            <div class="panel-heading">Objetos</div>
            <div class="panel-body">
                fasdfasdfasdf
                asfasdfasdfasdfasdf
                asdfasdfasd
            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                         aria-valuemin="0" aria-valuemax="100" style="width:75%">
                        1950pts
                    </div>

                </div>
                

            </div>
        </div>
    </div>


    <div class="col-sm-6">


        <div class="panel panel-info">
            <div class="panel-heading">Objetos</div>
            <div class="panel-body">
                fadfasdfasdfadfasdf

            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                         aria-valuemin="0" aria-valuemax="100" style="width:45%">
                        1950pts
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="col-sm-6">


        <div class="panel panel-info">
            <div class="panel-heading">Objetos</div>
            <div class="panel-body">
                fadfasdfasdfadfasdf

            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                         aria-valuemin="0" aria-valuemax="100" style="width:56%">
                        1950pts
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="col-sm-6">


        <div class="panel panel-danger">
            <div class="panel-heading">Objetos</div>
            <div class="panel-body">
                fadfasdfasdfadfasdf

            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                         aria-valuemin="0" aria-valuemax="100" style="width:15%">
                        1950pts
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="col-sm-6">


        <div class="panel panel-danger">
            <div class="panel-heading">Objetos</div>
            <div class="panel-body">
                fadfasdfasdfadfasdf

            </div>
            <div class="panel-footer">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                         aria-valuemin="0" aria-valuemax="100" style="width:0%">

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

