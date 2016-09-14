<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author laercio
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login-web']))
        LoginController::login();
    else if (isset($_POST['create-user']))
        LoginController::createUser();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == 'logout')
        LoginController::logout();
}

class LoginController {

    static function login() {

        $usuario = self::verificarLogin($_POST['login'], $_POST['senha']);

        if (!isset($usuario['erro'])) {
            session_start();
            $_SESSION['login'] = $usuario['usuario'];

            $_SESSION['login_object'] = $usuario;
            header("Location: ../?controller=usuario&action=home");
            die();
        } else {
            print_r($usuario);
            session_start();
            $_SESSION['erro'] = $usuario['erro'];
        }
        //header("Location: ../views/login/index.php?login=error");
    }

    static function isLogged() {

        if (!isset($_SESSION['login'])) {
            return false;
        }

        if (isset($_SESSION['login_object'])) {
            $usuario = $_SESSION['login_object'];
            if ($usuario['usuario'] != $_SESSION['login'])
                return false;
        }


        return true;
    }

    public static function logout() {
        unset($_SESSION['login']);
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=../views/login/index.php\">";
        die();
    }

    public static function verificarLogin($login, $senha) {

        @include_once '../connection.php';
        $req = Db::getInstance()->prepare('SELECT * FROM usuario WHERE (email = :login or usuario = :login) and senha = :senha');


        $req->bindValue(":login", $login);
        $req->bindValue(":senha", md5($senha));
        $req->execute();
        $linha = $req->fetch();
        print_r($linha);
        if ($linha['usuario'] == '') {
            $linha['erro'] = "E-mail ou senha inválidos.";
        } else if ($linha['status'] == 0) {
            $linha['erro'] = "Por favor, verifique sua caixa de entrada para validar seu e-mail.";
        }
        return $linha;
    }

    public static function createUser() {
        @include_once '../connection.php';

        require '../models/Usuario.php';
        require '../models/UsuarioDAO.php';

        $usuario = UsuarioDAO::findByEmail($_POST['email'], $_POST['usuario']);
        if ($usuario->getEmail() == $_POST['email']) {
            echo "email_cadastrado";
            return;
        } else if ($usuario->getusuario() != '') {
            echo "usuario_cadastrado";
            return;
        }


        /*         * ****
         * Upload de imagens
         * **** */

// verifica se foi enviado um imagem
        if (isset($_FILES['imagem']['name']) && $_FILES['imagem']['error'] == 0) {
            echo 'Você enviou o imagem: <strong>' . $_FILES['imagem']['name'] . '</strong><br />';
            echo 'Este imagem é do tipo: <strong > ' . $_FILES['imagem']['type'] . ' </strong ><br />';
            echo 'Temporáriamente foi salvo em: <strong>' . $_FILES['imagem']['tmp_name'] . '</strong><br />';
            echo 'Seu tamanho é: <strong>' . $_FILES['imagem']['size'] . '</strong> Bytes<br /><br />';

            $imagem_tmp = $_FILES['imagem']['tmp_name'];
            $nome = $_FILES['imagem']['name'];

            // Pega a extensão
            $extensao = pathinfo($nome, PATHINFO_EXTENSION);

            // Converte a extensão para minúsculo
            $extensao = strtolower($extensao);

            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = uniqid(time()) . $extensao;

                // Concatena a pasta com o nome

                $destino = '../storage/imagens/users/' . $_POST['usuario'];

                mkdir($destino);
                $destino = $destino . $novoNome;

                // tenta mover o imagem para o destino
                if (@move_uploaded_file($imagem_tmp, $destino)) {
                    //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                } //else
                //echo 'Erro ao salvar o imagem. Aparentemente você não tem permissão de escrita.<br />';
            } //else
            //echo 'Você poderá enviar apenas imagems "*.jpg;*.jpeg;*.gif;*.png"<br />';
        } //else
        //echo 'Você não enviou nenhum imagem!';










        $usuario = new Usuario();
        $usuario->setNome($_POST["nome"]);
        $usuario->setEmail($_POST["email"]);
        $usuario->setPerfil("comum");
        $usuario->setusuario($_POST["usuario"]);
        $usuario->setSenha(md5($_POST["senha"]));
        $usuario->setNivel("1");
        $usuario->setPontuacao("0");
        if (UsuarioDAO::add($usuario)) {
            echo "cadastrado";
        } else {
            echo "nao";
        }
    }

}
