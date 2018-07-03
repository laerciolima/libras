
<h2>Editar Gravacao</h2>




<form method="post" action="?controller=gravacao&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="data">data:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $gravacao->getdata(); ?>" name="data" id="data" placeholder="Digite o data">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="video">Video:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $gravacao->getVideo(); ?>" name="video" id="video" placeholder="Digite o video">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_sinal">Fk_id_sinal:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $gravacao->getFk_id_sinal(); ?>" name="fk_id_sinal" id="fk_id_sinal" placeholder="Digite o fk_id_sinal">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_usuario">Fk_id_usuario:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $gravacao->getFk_id_usuario(); ?>" name="fk_id_usuario" id="fk_id_usuario" placeholder="Digite o fk_id_usuario">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>