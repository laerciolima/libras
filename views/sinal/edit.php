
<h2>Editar Sinal</h2>




<form method="post" action="?controller=sinal&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_categoria">Fk_id_categoria:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getFk_id_categoria(); ?>" name="fk_id_categoria" id="fk_id_categoria" placeholder="Digite o fk_id_categoria">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="dificuldade">Dificuldade:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getDificuldade(); ?>" name="dificuldade" id="dificuldade" placeholder="Digite o dificuldade">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="foto">Foto:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getFoto(); ?>" name="foto" id="foto" placeholder="Digite o foto">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="orientacao">Orientacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getOrientacao(); ?>" name="orientacao" id="orientacao" placeholder="Digite o orientacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="video">Video:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getVideo(); ?>" name="video" id="video" placeholder="Digite o video">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_expressao_facial">Fk_id_expressao_facial:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getFk_id_expressao_facial(); ?>" name="fk_id_expressao_facial" id="fk_id_expressao_facial" placeholder="Digite o fk_id_expressao_facial">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_ponto_de_articulacao">Fk_id_ponto_de_articulacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $sinal->getFk_id_ponto_de_articulacao(); ?>" name="fk_id_ponto_de_articulacao" id="fk_id_ponto_de_articulacao" placeholder="Digite o fk_id_ponto_de_articulacao">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>