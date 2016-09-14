
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Movimento: <?php echo $movimento->getNome();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $movimento->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $movimento->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Imagem</th>
        <td><?php echo $movimento->getImagem()?></td>
    </tr>
    </tbody>
  </table>
