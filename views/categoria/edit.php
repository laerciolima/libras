
<h2>Editar Categoria</h2>




<form method="post" action="?controller=categoria&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $categoria->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="descricao">Descricao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $categoria->getDescricao(); ?>" name="descricao" id="descricao" placeholder="Digite o descricao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="imagem">Imagem:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $categoria->getImagem(); ?>" name="imagem" id="imagem" placeholder="Digite o imagem">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_modulo">Fk_id_modulo:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $categoria->getFk_id_modulo(); ?>" name="fk_id_modulo" id="fk_id_modulo" placeholder="Digite o fk_id_modulo">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>