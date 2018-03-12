
<h2>Adicionar BadgeUsuario</h2>




<form method="post" action="?controller=badgeusuario&action=add" class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_usuario">Fk_id_usuario:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="fk_id_usuario" id="fk_id_usuario" placeholder="Digite o fk_id_usuario">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_badge">Fk_id_badge:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="fk_id_badge" id="fk_id_badge" placeholder="Digite o fk_id_badge">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="data">Data:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="data" id="data" placeholder="Digite o data">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>