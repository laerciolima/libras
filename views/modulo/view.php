
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Modulo: <?php echo $modulo->getNome();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $modulo->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $modulo->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Descricao</th>
        <td><?php echo $modulo->getDescricao()?></td>
    </tr>
    <tr align="left">
        <th>Nivel</th>
        <td><?php echo $modulo->getNivel()?></td>
    </tr>
    </tbody>
  </table>
