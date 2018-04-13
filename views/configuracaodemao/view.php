
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>ConfiguracaoDeMao: <?php echo $configuracaodemao->getNome();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $configuracaodemao->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $configuracaodemao->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Imagem</th>
        <td><?php echo $configuracaodemao->getImagem()?></td>
    </tr>
    </tbody>
  </table>
