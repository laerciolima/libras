
<h2>Adicionar Módulo</h2>




<form method="post" action="?controller=modulo&action=add" class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="descricao">Descrição:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite o descrição">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nivel">Ordem:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nivel" id="nivel" placeholder="Digite a ordem">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nivel">Tempo:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="tempo" id="tempo_sinal" placeholder="Digite o tempo">
        </div>
    </div>
      <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>