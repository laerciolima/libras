
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Sinal: <?php echo $sinal->getNome();?></h2>



                <div class="col-md-6 ">
                


<table class="view" >
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $sinal->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $sinal->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Video</th>
        <td><?php echo $sinal->getVideo()?></td>
    </tr>
    <tr align="left">
        <th>Foto</th>
        <td><?php echo $sinal->getFoto()?></td>
    </tr>
    <tr align="left">
        <th>Orientacao</th>
        <td><?php echo $sinal->getOrientacao()?></td>
    </tr>
    <tr align="left">
        <th>ExpressaoFacial_idExpressaoFacial</th>
        <td><?php echo $sinal->getExpressaoFacial_idExpressaoFacial()?></td>
    </tr>
    <tr align="left">
        <th>PontoDeArticulacao_idPontoDeArticulacao</th>
        <td><?php echo $sinal->getPontoDeArticulacao_idPontoDeArticulacao()?></td>
    </tr>
    <tr align="left">
        <th>SinalDefinePesoInicial</th>
        <td><?php echo $sinal->getSinalDefinePesoInicial()?></td>
    </tr>
    
    <tr align="left">
        <th>UtilizacaoDasMaos</th>
        <td><?php echo $sinal->getUtilizacaoDasMaos()?></td>
    </tr>
    <tr align="left">
        <th>MaoPrincipal_id</th>
        <td><?php echo $sinal->getMaoPrincipal_id()?></td>
    </tr>
    <tr align="left">
        <th>MaoSecundaria_id</th>
        <td><?php echo $sinal->getMaoSecundaria_id()?></td>
    </tr>
    </tbody>
  </table>
</div>

  <div class="col-md-6 ">

<div class="embed-responsive embed-responsive-4by3">


    <video controls autoplay="true" id="video" class="embed-responsive-item">
        <source id="mp4Source" src="storage/videos/sinais/<?php echo $sinal->getVideo()?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
</div>