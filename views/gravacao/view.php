
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Gravacao: <?php echo $gravacao->getData();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $gravacao->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Data</th>
        <td><?php echo $gravacao->getData()?></td>
    </tr>
    <tr align="left">
        <th>Video</th>
        <td><?php echo $gravacao->getVideo()?></td>
    </tr>
    <tr align="left">
        <th>Fk_id_sinal</th>
        <td><?php echo $gravacao->getFk_id_sinal()?></td>
    </tr>
    <tr align="left">
        <th>Fk_id_usuario</th>
        <td><?php echo $gravacao->getFk_id_usuario()?></td>
    </tr>
    </tbody>
  </table>
