
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>BadgeUsuario: <?php echo $badgeusuario->getFk_id_usuario();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $badgeusuario->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Fk_id_usuario</th>
        <td><?php echo $badgeusuario->getFk_id_usuario()?></td>
    </tr>
    <tr align="left">
        <th>Fk_id_badge</th>
        <td><?php echo $badgeusuario->getFk_id_badge()?></td>
    </tr>
    <tr align="left">
        <th>Data</th>
        <td><?php echo $badgeusuario->getData()?></td>
    </tr>
    </tbody>
  </table>
