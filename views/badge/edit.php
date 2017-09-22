
<h2>Editar Badge</h2>




<form method="post" action="?controller=badge&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="descricao">Descricao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $badge->getDescricao(); ?>" name="descricao" id="descricao" placeholder="Digite o descricao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="img">Img:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $badge->getImg(); ?>" name="img" id="img" placeholder="Digite o img">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>