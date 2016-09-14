
<h2>Editar Modulo</h2>




<form method="post" action="?controller=modulo&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $modulo->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="descricao">Descricao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $modulo->getDescricao(); ?>" name="descricao" id="descricao" placeholder="Digite o descricao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nivel">Nivel:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $modulo->getNivel(); ?>" name="nivel" id="nivel" placeholder="Digite o nivel">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>