
<button  onclick="javascript:history.back()" type="button" class="btn btn-default btn-sm" style="margin-top: 5px">
                    < Voltar
                </button><h2>Usuario: <?php echo $usuario->getNome();?></h2>


<table class="view">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo $usuario->getId() ?></td>
      </tr>
    <tr align="left">
        <th>Nome</th>
        <td><?php echo $usuario->getNome()?></td>
    </tr>
    <tr align="left">
        <th>Email</th>
        <td><?php echo $usuario->getEmail()?></td>
    </tr>
    <tr align="left">
        <th>Perfil</th>
        <td><?php echo $usuario->getPerfil()?></td>
    </tr>
    <tr align="left">
        <th>usuario</th>
        <td><?php echo $usuario->getusuario()?></td>
    </tr>
    <tr align="left">
        <th>Senha</th>
        <td><?php echo $usuario->getSenha()?></td>
    </tr>
    <tr align="left">
        <th>Nivel</th>
        <td><?php echo $usuario->getNivel()?></td>
    </tr>
    <tr align="left">
        <th>Pontuacao</th>
        <td><?php echo $usuario->getPontuacao()?></td>
    </tr>
    <tr align="left">
        <th>Imagem</th>
        <td><?php echo $usuario->getImagem()?></td>
    </tr>
    </tbody>
  </table>
