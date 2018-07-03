
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Ranking: <?php echo $ranking->getPosicao();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $ranking->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Posicao</th>
        <td><?php echo $ranking->getPosicao()?></td>
    </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $ranking->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Nivel</th>
        <td><?php echo $ranking->getNivel()?></td>
    </tr>
    <tr align="left">
        <th>Pontuacao</th>
        <td><?php echo $ranking->getPontuacao()?></td>
    </tr>
    <tr align="left">
        <th>fk_id_usuario</th>
        <td><?php echo $ranking->getfk_id_usuario()?></td>
    </tr>
    </tbody>
  </table>
