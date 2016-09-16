
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Sinal: <?php echo $sinal->getFk_id_categoria();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $sinal->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Fk_id_categoria</th>
        <td><?php echo $sinal->getFk_id_categoria()?></td>
    </tr>
    <tr align="left">
        <th>Dificuldade</th>
        <td><?php echo $sinal->getDificuldade()?></td>
    </tr>
    <tr align="left">
        <th>Foto</th>
        <td><?php echo $sinal->getFoto()?></td>
    </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $sinal->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Orientacao</th>
        <td><?php echo $sinal->getOrientacao()?></td>
    </tr>
    <tr align="left">
        <th>Video</th>
        <td><?php echo $sinal->getVideo()?></td>
    </tr>
    <tr align="left">
        <th>Fk_id_expressao_facial</th>
        <td><?php echo $sinal->getFk_id_expressao_facial()?></td>
    </tr>
    <tr align="left">
        <th>Fk_id_ponto_de_articulacao</th>
        <td><?php echo $sinal->getFk_id_ponto_de_articulacao()?></td>
    </tr>
    </tbody>
  </table>
