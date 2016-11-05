
<h2>Editar Estudante</h2>




<form method="post" action="?controller=estudante&action=edit&id=<?php echo $_GET['id'];?> " class="form-horizontal" role="form">
<div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="cpf">Cpf:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getCpf(); ?>" name="cpf" id="cpf" placeholder="Digite o cpf">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="data_de_nascimento">Data de nascimento:</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" value="<?php echo $estudante->getData_de_nascimento(); ?>" name="data_de_nascimento" id="data_de_nascimento" placeholder="Digite o data_de_nascimento">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="endereco">Endereço:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getEndereco(); ?>" name="endereco" id="endereco" placeholder="Digite o endereço">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="telefone">Telefone:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getTelefone(); ?>" name="telefone" id="telefone" placeholder="Digite o telefone">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="fk_id_universidade">Universidade:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getFk_id_universidade(); ?>" name="fk_id_universidade" id="fk_id_universidade" placeholder="Digite o fk_id_universidade">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="curso">Curso:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getCurso(); ?>" name="curso" id="curso" placeholder="Digite o curso">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="login">Login:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $estudante->getLogin(); ?>" name="login" id="login" placeholder="Digite o login">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="senha">Senha:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" value="<?php echo $estudante->getSenha(); ?>" name="senha" id="senha" placeholder="Digite o senha">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="horario">Horário:</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" value="<?php echo $estudante->getHorario(); ?>" name="horario" id="horario" placeholder="Digite o horario">
        </div>
    </div>  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>