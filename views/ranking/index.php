<h1 class="text-center">Ranking</h1>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Amigos</a></li>
    <li><a data-toggle="tab" href="#menu1">Geral</a></li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Amigos</h3>
        <p>Veja o ranking dos seus amigos.</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Usuário</th>
                    <th>Sinais aprendidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $posicao = 0;
                foreach ($ranking_amigos as $usuario) {
                    $posicao++;
                    ?>


                    <tr>
                        <td><?php echo $posicao;  ?></td>
                        <td><?php echo $usuario->getNome();  ?></td>
                        <td><div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $usuario->getPontuacao()  ?>%">
                                    <?php echo $usuario->getPontuacao();  ?>
                                </div>

                            </div></td>

                    </tr>


                <?php } ?>
            </tbody>
        </table>
        <button class="btn btn-default ">Ver tudo</button>
    </div>
    <div id="menu1" class="tab-pane fade">
        <h3>Geral</h3>
        <p>Veja o ranking geral dos usuários.</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Usuário</th>
                    <th>Sinais aprendidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $posicao = 0;
                foreach ($ranking_geral as $usuario) {
                    $posicao++;
                    ?>


                    <tr>
                        <td><?php echo $posicao;  ?></td>
                        <td><?php echo $usuario->getNome();  ?></td>
                        <td>LV <?php echo $usuario->getNivel();  ?></td>
                        <td><div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $usuario->getPontuacao()/20  ?>%">
                                    <?php echo $usuario->getPontuacao();  ?>pts
                                </div>

                            </div></td>

                    </tr>


                <?php } ?>
            </tbody>
        </table>

    </div>

</div>
