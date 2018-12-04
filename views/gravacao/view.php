
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Gravacao: <?php echo $gravacao->getId();?></h2>
<div class="row">

<style>

    </style>

<table class="view col-md-12" >
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $gravacao->getId() ?></td>
      </tr>
    <tr align="left">
        <th>data</th>
       <td><?php echo date('d/m/Y', strtotime($gravacao->getData())); ?></td>
    </tr>
    <tr align="left">
        <th>Sinal</th>
        <td><?php echo SinalDAO::find($gravacao->getFk_id_sinal())->getNome();?></td>
    </tr>
    </tbody>
  </table>

<div class="col-md-6 ">

    <div class="embed-responsive embed-responsive-4by3">


        <video controls autoplay="true" id="video" class="embed-responsive-item">
            <source id="mp4Source" src="storage/videos/users/<?php echo $gravacao->getFk_id_usuario()."/".$gravacao->getVideo()?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
  </div>
</div>


  <h1>Avaliações</h1>

<div class="row">
        <?php
        if(!count($avaliacoes))
          echo "Não há avaliações para este video!";

           foreach ($avaliacoes as $avaliacao) { ?>
            <table class="view col-md-5">
                <tbody>
                  <tr align="left">
                    <th>Nota configuração mao</th>
                    <td style="min-width: 150px"><div class="progress">
  <div class="progress-bar <?php echo ($avaliacao->getNota_configuracao_mao() <3) ? "progress-bar-danger" : "progress-bar-info"?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="1" aria-valuemax="100" style="width:<?php echo $avaliacao->getNota_configuracao_mao() * 20?>%">
  <?php echo $avaliacao->getNota_configuracao_mao() * 20?>
  </div>
</div></td>
                </tr>
                <tr align="left">
                    <th>Nota expressão facial</th>
                    <td><div class="progress">
  <div class="progress-bar <?php echo ($avaliacao->getNota_expressao_facial() <3) ? "progress-bar-danger" : "progress-bar-info"?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="1" aria-valuemax="100" style="width:<?php echo $avaliacao->getNota_expressao_facial() * 20?>%">
  <?php echo $avaliacao->getNota_expressao_facial() * 20?>
  </div>
</div></td>
                </tr>
                <tr align="left">
                    <th>Nota movimento</th>
                    <td><div class="progress">
  <div class="progress-bar <?php echo ($avaliacao->getNota_movimento() <3) ? "progress-bar-danger" : "progress-bar-info"?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="1" aria-valuemax="100" style="width:<?php echo $avaliacao->getNota_movimento() * 20?>%">
  <?php echo $avaliacao->getNota_movimento() * 20?>
  </div>
</div></td>
                </tr>
                <tr align="left">
                    <th> Nota orientção</th>
                    <td><div class="progress">
  <div class="progress-bar <?php echo ($avaliacao->getNota_orientacao() <3) ? "progress-bar-danger" : "progress-bar-info"?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="1" aria-valuemax="100" style="width:<?php echo $avaliacao->getNota_orientacao() * 20?>%">
  <?php echo $avaliacao->getNota_orientacao() * 20?>
  </div>
</div></td>
                </tr>
                <tr align="left">
                    <th>Nota ponto articulação</th>
                    <td><div class="progress">
  <div class="progress-bar <?php echo ($avaliacao->getNota_ponto_articulacao() <3) ? "progress-bar-danger" : "progress-bar-info"?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="1" aria-valuemax="100" style="width:<?php echo $avaliacao->getNota_ponto_articulacao() * 20?>%">
  <?php echo $avaliacao->getNota_ponto_articulacao() * 20?>
  </div>
</div>
                    
                    </td>
                </tr>
                <tr align="left">
                    <th>Nota media</th>
                    <td><div class="progress">
  <div class="progress-bar <?php echo ($avaliacao->getNota_media() <3) ? "progress-bar-danger" : "progress-bar-info"?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="1" aria-valuemax="5" style="width:<?php echo $avaliacao->getNota_media() * 20?>%">
  </div>
</div></td>
                </tr>
                <tr align="left">
                    <th>Observações</th>
                    <td><?php echo $avaliacao->getObservacoes()?></td>
                </tr>
                </tbody>
              </table>

          <?php } ?>
</div>
