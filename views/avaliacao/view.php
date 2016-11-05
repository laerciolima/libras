
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Avaliacao: <?php echo $avaliacao->getData();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $avaliacao->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Data</th>
        <td><?php echo $avaliacao->getData()?></td>
    </tr>
    <tr align="left">
        <th>Nota configuracao_mao</th>
        <td><?php echo $avaliacao->getNota_configuracao_mao()?></td>
    </tr>
    <tr align="left">
        <th>Nota expressao facial</th>
        <td><?php echo $avaliacao->getNota_expressao_facial()?></td>
    </tr>
    <tr align="left">
        <th>Nota media</th>
        <td><?php echo $avaliacao->getNota_media()?></td>
    </tr>
    <tr align="left">
        <th>Nota movimento</th>
        <td><?php echo $avaliacao->getNota_movimento()?></td>
    </tr>
    <tr align="left">
        <th> Nota orientacao</th>
        <td><?php echo $avaliacao->getNota_orientacao()?></td>
    </tr>
    <tr align="left">
        <th>Nota ponto articulacao</th>
        <td><?php echo $avaliacao->getNota_ponto_articulacao()?></td>
    </tr>
    <tr align="left">
        <th>Fk id gravacao</th>
        <td><?php echo $avaliacao->getFk_id_gravacao()?></td>
    </tr>
    <tr align="left">
        <th>Fk id usuario</th>
        <td><?php echo $avaliacao->getFk_id_usuario()?></td>
    </tr>
    <tr align="left">
        <th>Nota final</th>
        <td><?php echo $avaliacao->getNota_final()?></td>
    </tr>
    <tr align="left">
        <th>Observacoes</th>
        <td><?php echo $avaliacao->getObservacoes()?></td>
    </tr>
    </tbody>
  </table>
