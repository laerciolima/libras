
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




  <h1>Avaliações</h1>

<div class="row">
          <?php foreach ($avaliacoes as $avaliacao) { ?>
            <table class="view col-md-5">
                <tbody>
                  <tr align="left">
                    <th>Nota configuração mao</th>
                    <td><?php echo $avaliacao->getNota_configuracao_mao()?></td>
                </tr>
                <tr align="left">
                    <th>Nota expressão facial</th>
                    <td><?php echo $avaliacao->getNota_expressao_facial()?></td>
                </tr>
                <tr align="left">
                    <th>Nota movimento</th>
                    <td><?php echo $avaliacao->getNota_movimento()?></td>
                </tr>
                <tr align="left">
                    <th> Nota orientção</th>
                    <td><?php echo $avaliacao->getNota_orientacao()?></td>
                </tr>
                <tr align="left">
                    <th>Nota ponto articulação</th>
                    <td><?php echo $avaliacao->getNota_ponto_articulacao()?></td>
                </tr>
                <tr align="left">
                    <th>Nota media</th>
                    <td><?php echo $avaliacao->getNota_media()?></td>
                </tr>
                <tr align="left">
                    <th>Observações</th>
                    <td><?php echo $avaliacao->getObservacoes()?></td>
                </tr>
                </tbody>
              </table>

          <?php } ?>
</div>
