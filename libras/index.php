<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script src="src/js/jogar.js"></script>
        <link rel="stylesheet" type="text/css" href="src/css/jogar.css">
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>

    <center>
        <div id="game">
            <div style="width: 100%; height: 380px;">
                <div id="esquerda">
                    <video width="480" height="360" controls autoplay="" id="video">
                        <source src="124074151.webm" type="video/webM">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div id="direita">
                    <div id="painel_alternativas" style="display: none">
                        <div class="alternativa" id="alternativa1" onclick="checkResposta(1)">fasdfasdfasfdasdf</div>
                        <div class="alternativa" id="alternativa2" onclick="checkResposta(2)">fasdfasdfasfdasdf</div>
                        <div class="alternativa" id="alternativa3" onclick="checkResposta(3)">fasdfasdfasfdasdf</div>
                        <div class="alternativa" id="alternativa4" onclick="checkResposta(4)">fasdfasdfasfdasdf</div>
                    </div>

                    <div id="painel_avaliacao" style="display: none">
                        <div id="estrelas">
                            <h2>Avalie o video!</h2>
                        </div>
                        <div id="botoes_avaliacao" >
                            <div class="botao"><img style="margin-right: 10px" src="./src/img/bom.png" align="center"/> Bom&nbsp&nbsp;</div>
                            <div class="botao"><img style="margin-right: 10px" src="./src/img/medio.png" align="center"/> Médio</div>
                            <div class="botao"><img style="margin-right: 10px" src="./src/img/ruim.png" align="center"/> Ruim</div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="cronometro">
                <div id="tempo">30s</div>
            </div>
        </div>
    </center>
</body>
</html>
