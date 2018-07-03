
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Estudante: <?php echo $estudante->getNome();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $estudante->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $estudante->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Cpf</th>
        <td><?php echo $estudante->getCpf()?></td>
    </tr>
    <tr align="left">
        <th>Data de nascimento</th>
        <td><?php echo $estudante->getData_de_nascimento()?></td>
    </tr>
    <tr align="left">
        <th>Endereco</th>
        <td><?php echo $estudante->getEndereco()?></td>
    </tr>
    <tr align="left">
        <th>Telefone</th>
        <td><?php echo $estudante->getTelefone()?></td>
    </tr>
    <tr align="left">
        <th>Fk id universidade</th>
        <td><?php echo $estudante->getFk_id_universidade()?></td>
    </tr>
    <tr align="left">
        <th>Curso</th>
        <td><?php echo $estudante->getCurso()?></td>
    </tr>
    <tr align="left">
        <th>Login</th>
        <td><?php echo $estudante->getLogin()?></td>
    </tr>
    <tr align="left">
        <th>Senha</th>
        <td><?php echo $estudante->getSenha()?></td>
    </tr>
    <tr align="left">
        <th>Horario</th>
        <td><?php echo $estudante->getHorario()?></td>
    </tr>
    </tbody>
  </table>
