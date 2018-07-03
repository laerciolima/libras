
<h2>Adicionar Estudante</h2>




<form method="post" action="?controller=estudante&action=add" class="form-horizontal" role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="cpf">Cpf:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite o cpf">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="data_de_nascimento">Data de nascimento:</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="data_de_nascimento" id="data_de_nascimento" placeholder="Digite o data_de_nascimento">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="endereco">Endereço:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o endereco">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="telefone">Telefone:</label>
        <div class="col-sm-2">
            <input type="text" class="telefone form-control " name="telefone" id="telefone" placeholder="Digite o telefone">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_universidade">Universidade:</label>
        <div class="col-sm-4">

            <select class="form-control" name="fk_id_universidade" id="fk_id_universidade">
                <?php foreach ($universidades as $universidade) { ?>
                <option value="<?php echo $universidade->getId();?>"><?php echo $universidade->getNome();?></option>
                <?php } ?>
                
            </select>
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="curso">Curso:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="curso" id="curso" placeholder="Digite o curso">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="login">Login:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="login" id="login" placeholder="Digite o login">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="senha">Senha:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite o senha">
        </div>
        <div class="col-sm-4">
            <button type="button" onclick="gerarSenhaEstudante()" data-toggle="modal" data-target="#myModal" class="btn btn-default">Gerar Senha</button>
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="horario">Horario:</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" name="horario" id="horario" placeholder="Digite o horario">
        </div>
    </div>  <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
    
    
    
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Senha gerada</h4>
        </div>
        <div class="modal-body">
            <span id="senha_modal"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</form>