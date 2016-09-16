
<h2>Alterar perfil</h2>


<br/>

<form method="post" action="?controller=usuario&action=edit" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" value="<?php echo $usuario->getNome(); ?>" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-4">
            <input type="text" disabled="true" class="form-control" value="<?php echo $usuario->getEmail(); ?>" name="email" id="email" placeholder="Digite o email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="usuario">Usuário:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" disabled="true" value="<?php echo $usuario->getusuario(); ?>" name="usuario" id="usuario" placeholder="Digite o usuario">
        </div>

    </div><div class="form-group">
        <label class="control-label col-sm-2" for="imagem">Foto de perfil:</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="imagem"/>
        </div>
    </div>  <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
</form>
