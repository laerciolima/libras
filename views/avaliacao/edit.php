
<h2>Editar Avaliacao</h2>




<form method="post" action="?controller=avaliacao&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="data">Data:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getData(); ?>" name="data" id="data" placeholder="Digite o data">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_configuracao_mao">Nota_configuracao_mao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_configuracao_mao(); ?>" name="nota_configuracao_mao" id="nota_configuracao_mao" placeholder="Digite o nota_configuracao_mao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_expressao_facial">Nota_expressao_facial:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_expressao_facial(); ?>" name="nota_expressao_facial" id="nota_expressao_facial" placeholder="Digite o nota_expressao_facial">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_media">Nota_media:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_media(); ?>" name="nota_media" id="nota_media" placeholder="Digite o nota_media">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_movimento">Nota_movimento:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_movimento(); ?>" name="nota_movimento" id="nota_movimento" placeholder="Digite o nota_movimento">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_orientacao">Nota_orientacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_orientacao(); ?>" name="nota_orientacao" id="nota_orientacao" placeholder="Digite o nota_orientacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_ponto_articulacao">Nota_ponto_articulacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_ponto_articulacao(); ?>" name="nota_ponto_articulacao" id="nota_ponto_articulacao" placeholder="Digite o nota_ponto_articulacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_gravacao">Fk_id_gravacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getFk_id_gravacao(); ?>" name="fk_id_gravacao" id="fk_id_gravacao" placeholder="Digite o fk_id_gravacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_usuario">Fk_id_usuario:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getFk_id_usuario(); ?>" name="fk_id_usuario" id="fk_id_usuario" placeholder="Digite o fk_id_usuario">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nota_final">Nota_final:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getNota_final(); ?>" name="nota_final" id="nota_final" placeholder="Digite o nota_final">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="observacoes">Observacoes:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $avaliacao->getObservacoes(); ?>" name="observacoes" id="observacoes" placeholder="Digite o observacoes">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>