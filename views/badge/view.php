
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Badge: <?php echo $badge->getDescricao();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $badge->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Descricao</th>
        <td><?php echo $badge->getDescricao()?></td>
    </tr>
    <tr align="left">
        <th>Img</th>
        <td><?php echo $badge->getImg()?></td>
    </tr>
    </tbody>
  </table>
