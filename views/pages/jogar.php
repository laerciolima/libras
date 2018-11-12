<script src="webroot/js/jogar.js" ></script>
<script type="text/javascript">
    var gravacoes = [
<?php

$path = $gravacoes[0]->getFk_id_usuario() == 0 ? "storage/videos/sinais" : "storage/videos/users/".$gravacoes[0]->getFk_id_usuario();

echo "new Gravacao(" . $gravacoes[0]->getId() . ",'" . $path . "/" . $gravacoes[0]->getVideo() . "'," . $gravacoes[0]->getFk_id_usuario() . "," . $gravacoes[0]->getFk_id_sinal() . ", '".$gravacoes[0]->getVideoOriginal()."')";
for ($i = 1; $i < count($gravacoes); $i++) {
    $path = $gravacoes[$i]->getFk_id_usuario() == 0 ? "storage/videos/sinais" : "storage/videos/users/".$gravacoes[$i]->getFk_id_usuario();
    echo ", new Gravacao(" . $gravacoes[$i]->getId() . ",'" . $path . "/" . $gravacoes[$i]->getVideo() . "'," . $gravacoes[$i]->getFk_id_usuario() . "," . $gravacoes[$i]->getFk_id_sinal() . ", '".$gravacoes[$i]->getVideoOriginal()."')";
}
?>
    ];

    console.log(gravacoes);
    var lista_de_opcoes = [

<?php
echo "['" . $gravacoes[0]->getOpcoes()[0] . "','" . $gravacoes[0]->getOpcoes()[1] . "','" . $gravacoes[0]->getOpcoes()[2] . "','" . $gravacoes[0]->getOpcoes()[3] . "'] ";
for ($i = 1; $i < count($gravacoes); $i++) {
    echo ", ['" . $gravacoes[$i]->getOpcoes()[0] . "','" . $gravacoes[$i]->getOpcoes()[1] . "','" . $gravacoes[$i]->getOpcoes()[2] . "','" . $gravacoes[$i]->getOpcoes()[3] . "'] ";
}

?>
    ];

<?php
if(isset($fk_id_atividade)){
    echo "var id_atividade = ".$fk_id_atividade.";";
}
?>
    var tempo_modulo = <?php echo $modulo->getTempo(); ?>;
    



    console.log(lista_de_opcoes);
</script>


<h1 class="text-center">Jogar</h1>
<div class="row">


    <div class="player_video_avaliacao col-sm-6 ">

        <div class="row" >
            <div id="cronometro" class="text-center">
                <div id="tempo">10s</div> 
            </div>
            <div id="etapa_atividade">
                1/<?php echo count($gravacoes); ?>
            </div>

        </div>

        <div class="embed-responsive embed-responsive-4by3">

            <video controls autoplay="true" id="video" class="embed-responsive-item">
                <source id="mp4Source" src="storage/videos/users/1/madrugada.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

    </div>
    <div class="player_video_avaliacao col-sm-6 ">
        <h4 class="text-center">Escolha a opção correta:</h4>
        <button type="button" id="opt0" class="btn btn-default btn-block opt_sinal" onclick="validar(0)">Tarde</button>
        <button type="button" id="opt1" class="btn btn-default btn-block opt_sinal" onclick="validar(1)">Manhã</button>
        <button type="button" id="opt2" class="btn btn-default btn-block opt_sinal" onclick="validar(2)">Madrugada</button>
        <button type="button" id="opt3" class="btn btn-default btn-block opt_sinal" onclick="validar(3)">Noite</button>

    </div>
</div>


<div id="avaliacao_sinal_div" >



    <div id="resposta_correta" style="display: none;">
        <h4 class="text-center">RESPOSTA CORRETA</h4>
        <img src="webroot/img/sinal_correto.png" width="150" class="img-responsive center-block"/>

    </div>
    <div id="resposta_incorreta" style="display: none;">
        <h4 class="text-center">RESPOSTA INCORRETA</h4>
        <img src="webroot/img/sinal_incorreto.jpg" width="150" class="img-responsive center-block"/>
    </div>
    <form id="avaliacao_sinal" style="display: ;">
<div class="row">
<div class="col-sm-6">
        
        <video controls autoplay="true" class="video_player"  id="video_player_avaliacao" class="embed-responsive-item">
            <source id="source_avaliacao" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

<div class="col-sm-6">
    
        <video controls autoplay="true" id="video_sinal_original" class="video_player" class="embed-responsive-item">
            <source id="source_avaliacao_original" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>



        </div>

        <input id="sinal_avaliacao" name="sinal_avaliacao" type="hidden" value=""/> 

        <div class="row">
            <div class="form-group col-xs-6">
                <label for="email">Configuração de Mão:</label>
                <input type="range" list="tickmarks" class="form-control" min="1" max="5" name="nota_configuracao_mao">                    
            </div>
            <div class="form-group col-xs-6">
                <label for="email">Ponto de articulação:</label>
                <input type="range" class="form-control" min="1" max="5" name="nota_ponto_articulacao">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-6">
                <label for="email">Movimento:</label>
                <input type="range" class="form-control" min="1" max="5" name="nota_movimento">
            </div>
            <div class="form-group col-xs-6">
                <label for="email">Orientação:</label>
                <input type="range" class="form-control" min="1" max="5" name="nota_orientacao">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-6">
                <label for="email">Expressão facial:</label>
                <input type="range" class="form-control" min="1" max="5" name="nota_expressao_facial">
            </div>
            <div class="form-group col-xs-6">
                <label for="email">Observações:</label>
                <textarea class="form-control" name="observacoes"></textarea>
            </div>
        </div>
        <div class="form-group">
            <a class="btn btn-block btn-info" id="addAvaliacao">Enviar</a>
        </div>

    </form>
</div>
