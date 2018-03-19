
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2 class="text-center">Suas conquistas</h2> <br/>

<div class="row">


  <?php 

  if(count($badges) == 0){

    echo "<h4>Voce ainda não tem conquistas, grave um sinal :D</h4>";


  }

  foreach ($badges as $badge) { ?>
      <div class="col-sm-4">


          <div class="panel panel-warning">
              <div class="panel-heading"><?php echo $badge->getDescricao(); ?></div>
              <div class="panel-body">
                  <img src="webroot/img/badges/<?php echo $badge->getImg(); ?>" class="img-rounded img-responsive center-block"/>
              </div>
          </div>
      </div>
      <?php
  }
  ?>


</div>
