
<h2>Adicionar Categoria</h2>




<form method="post" action="?controller=categoria&action=add" class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="descricao">Descrição:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite o descricao">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_modulo">Módulo:</label>
        <div class="col-sm-4">
        <select class="form-control" name="fk_id_modulo">
                <?php foreach ($modulos as $modulo) { ?>
                    <option value="<?php echo $modulo->getId();?>"><?php echo $modulo->getNome()?></option>
                <?php } ?>
            </select>
            
        </div>
    </div>  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>
