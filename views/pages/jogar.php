<script type="text/javascript" src="webroot/js/jogar.js"></script>
<script type="text/javascript">
var gravacoes = [
   <?php
   echo "new Gravacao(".$gravacoes[0]->getId().",'storage/videos/users/".$gravacoes[0]->getFk_id_usuario()."/".$gravacoes[0]->getVideo()."',".$gravacoes[0]->getFk_id_usuario().",".$gravacoes[0]->getFk_id_sinal().")";
   for($i= 1; $i < count($gravacoes); $i++){
      echo ", new Gravacao(".$gravacoes[$i]->getId().",'storage/videos/users/".$gravacoes[$i]->getFk_id_usuario()."/".$gravacoes[$i]->getVideo()."',".$gravacoes[$i]->getFk_id_usuario().",".$gravacoes[$i]->getFk_id_sinal().")";
   }
   ?>
];

var lista_de_opcoes = [


   <?php

   echo "['".$gravacoes[0]->getOpcoes()[0]."','".$gravacoes[0]->getOpcoes()[1]."','".$gravacoes[0]->getOpcoes()[2]."','".$gravacoes[0]->getOpcoes()[3]."'] ";
   for($i= 1; $i < count($gravacoes); $i++){
      echo ", ['".$gravacoes[$i]->getOpcoes()[0]."','".$gravacoes[$i]->getOpcoes()[1]."','".$gravacoes[$i]->getOpcoes()[2]."','".$gravacoes[$i]->getOpcoes()[3]."'] ";
   }
   ?>
];
console.log(lista_de_opcoes);
</script>


<h1 class="text-center">Avaliar</h1>
<div class="row" >
   <div id="cronometro" class="text-center">
      <div id="tempo">10s</div>
   </div>
</div>
<div class="row">
   <div class="player_video_avaliacao col-sm-6 ">

      <div class="embed-responsive embed-responsive-4by3">

         <video controls autoplay="" id="video" class="embed-responsive-item">
            <source id="mp4Source" src="storage/videos/users/1/madrugada.mp4" type="video/mp4">
               Your browser does not support the video tag.
            </video>
         </div>

      </div>
      <div class="player_video_avaliacao col-sm-6 ">
         <h4 class="text-center">Escolha a opção correta:</h4>
         <button type="button" id="opt0" class="btn btn-default btn-block" onclick="validar(0)">Tarde</button>
         <button type="button" id="opt1" class="btn btn-default btn-block" onclick="validar(1)">Manhã</button>
         <button type="button" id="opt2" class="btn btn-default btn-block" onclick="validar(2)">Madrugada</button>
         <button type="button" id="opt3" class="btn btn-default btn-block" onclick="validar(3)">Noite</button>

      </div>
   </div>


   <!-- Modal -->
   <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Avalie este video</h4>
            </div>
            <div class="modal-body">

               <div id="resposta_correta" style="display: none">
                 <h4 class="text-center">RESPOSTA CORRETA</h4>
                 <img src="webroot/img/sinal_correto.png" class="img-responsive"/>

               </div>
               <div id="resposta_incorreta" style="display: none">
                 <h4 class="text-center">RESPOSTA INCORRETA</h4>
                 <img src="webroot/img/sinal_incorreto.jpg" class="img-responsive"/>
               </div>
               <form id="avaliacao_sinal">
                  <div class="form-group">
                     <label for="email">Configuração de Mão:</label>
                     <input type="range" class="form-control" name="nota_configuracao_mao">
                  </div>
                  <div class="form-group">
                     <label for="email">Ponto de articulação:</label>
                     <input type="range" class="form-control" name="nota_ponto_articulacao">
                  </div>
                  <div class="form-group">
                     <label for="email">Movimento:</label>
                     <input type="range" class="form-control" name="nota_movimento">
                  </div>
                  <div class="form-group">
                     <label for="email">Orientação:</label>
                     <input type="range" class="form-control" name="nota_orientacao">
                  </div>
                  <div class="form-group">
                     <label for="email">Expressão facial:</label>
                     <input type="range" class="form-control" name="nota_expressao_facial">
                  </div>
                  <div class="form-group">
                     <label for="email">Expressão facial:</label>
                     <textarea class="form-control" name="observacoes"></textarea>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-info" id="addAvaliacao" data-dismiss="myModal">Salvar</button>
            </div>
         </div>
      </div>
   </div>
