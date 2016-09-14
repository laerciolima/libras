
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Categoria: <?php echo $categoria->getNome();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $categoria->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $categoria->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Descricao</th>
        <td><?php echo $categoria->getDescricao()?></td>
    </tr>
    <tr align="left">
        <th>Imagem</th>
        <td><?php echo $categoria->getImagem()?></td>
    </tr>
    <tr align="left">
        <th>Fk_id_modulo</th>
        <td><?php echo $categoria->getFk_id_modulo()?></td>
    </tr>
    </tbody>
  </table>
