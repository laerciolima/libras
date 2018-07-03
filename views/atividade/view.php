
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Atividade: <?php echo $atividade->getTitulo();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $atividade->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Titulo</th>
        <td><?php echo $atividade->getTitulo()?></td>
    </tr>
    <tr align="left">
        <th>Descricao</th>
        <td><?php echo $atividade->getDescricao()?></td>
    </tr>
    <tr align="left">
        <th>Ordem</th>
        <td><?php echo $atividade->getOrdem()?></td>
    </tr>
    <tr align="left">
        <th>Fk id Modulo</th>
        <td><?php echo $atividade->getFk_id_Modulo()?></td>
    </tr>
    </tbody>
  </table>
