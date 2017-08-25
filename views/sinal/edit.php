
<h2>Editar Sinal</h2>




<form method="post" action="?controller=sinal&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="video">Video:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getVideo(); ?>" name="video" id="video" placeholder="Digite o video">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="foto">Foto:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getFoto(); ?>" name="foto" id="foto" placeholder="Digite o foto">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="orientacao">Orientacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getOrientacao(); ?>" name="orientacao" id="orientacao" placeholder="Digite o orientacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="expressaofacial_idexpressaofacial">ExpressaoFacial_idExpressaoFacial:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getExpressaoFacial_idExpressaoFacial(); ?>" name="expressaofacial_idexpressaofacial" id="expressaofacial_idexpressaofacial" placeholder="Digite o expressaofacial_idexpressaofacial">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="pontodearticulacao_idpontodearticulacao">PontoDeArticulacao_idPontoDeArticulacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getPontoDeArticulacao_idPontoDeArticulacao(); ?>" name="pontodearticulacao_idpontodearticulacao" id="pontodearticulacao_idpontodearticulacao" placeholder="Digite o pontodearticulacao_idpontodearticulacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="sinaldefinepesoinicial">SinalDefinePesoInicial:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getSinalDefinePesoInicial(); ?>" name="sinaldefinepesoinicial" id="sinaldefinepesoinicial" placeholder="Digite o sinaldefinepesoinicial">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="modulo_id">Modulo_id:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getModulo_id(); ?>" name="modulo_id" id="modulo_id" placeholder="Digite o modulo_id">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="utilizacaodasmaos">UtilizacaoDasMaos:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getUtilizacaoDasMaos(); ?>" name="utilizacaodasmaos" id="utilizacaodasmaos" placeholder="Digite o utilizacaodasmaos">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="maoprincipal_id">MaoPrincipal_id:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getMaoPrincipal_id(); ?>" name="maoprincipal_id" id="maoprincipal_id" placeholder="Digite o maoprincipal_id">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="maosecundaria_id">MaoSecundaria_id:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getMaoSecundaria_id(); ?>" name="maosecundaria_id" id="maosecundaria_id" placeholder="Digite o maosecundaria_id">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>