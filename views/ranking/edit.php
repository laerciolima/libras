
<h2>Editar Ranking</h2>




<form method="post" action="?controller=ranking&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="posicao">Posicao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $ranking->getPosicao(); ?>" name="posicao" id="posicao" placeholder="Digite o posicao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $ranking->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="nivel">Nivel:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $ranking->getNivel(); ?>" name="nivel" id="nivel" placeholder="Digite o nivel">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="pontuacao">Pontuacao:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $ranking->getPontuacao(); ?>" name="pontuacao" id="pontuacao" placeholder="Digite o pontuacao">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_usuario">fk_id_usuario:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $ranking->getfk_id_usuario(); ?>" name="fk_id_usuario" id="fk_id_usuario" placeholder="Digite o fk_id_usuario">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>