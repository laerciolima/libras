
<h2>Editar Atividade</h2>




<form method="post" action="?controller=atividade&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="titulo">Titulo:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $atividade->getTitulo(); ?>" name="titulo" id="titulo" placeholder="Digite o titulo">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="descricao">Descricao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $atividade->getDescricao(); ?>" name="descricao" id="descricao" placeholder="Digite o descricao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="ordem">Ordem:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $atividade->getOrdem(); ?>" name="ordem" id="ordem" placeholder="Digite o ordem">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_modulo">Fk_id_Modulo:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $atividade->getFk_id_Modulo(); ?>" name="fk_id_modulo" id="fk_id_modulo" placeholder="Digite o fk_id_modulo">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>