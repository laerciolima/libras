
<h2>Adicionar Movimento</h2>




<form method="post" action="?controller=movimento&action=add" class="form-horizontal" enctype="multipart/form-data" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="imagem">Imagem:</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="imagem" id="imagem">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>