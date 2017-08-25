
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Gravacao: <?php echo $gravacao->getdata();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $gravacao->getId() ?></td>
      </tr>
    <tr align="left">
        <th>data</th>
        <td><?php echo $gravacao->getdata()?></td>
    </tr>
    <tr align="left">
        <th>Video</th>
        <td><?php echo $gravacao->getVideo()?></td>
    </tr>
    <tr align="left">
        <th>Fk id sinal</th>
        <td><?php echo $gravacao->getFk_id_sinal()?></td>
    </tr>
    <tr align="left">
        <th>Fk id usuario</th>
        <td><?php echo $gravacao->getFk_id_usuario()?></td>
    </tr>
    </tbody>
  </table>
