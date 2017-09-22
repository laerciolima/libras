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
            session_start();
            $_SESSION['erro'] = $usuario['erro'];
        }
        header("Location: ../views/login/index.php?login=error");
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
        session_start();
        
        unset($_SESSION['login_object']);
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
        if ($linha['usuario'] == '') {
            $linha['erro'] = "login ou senha inválidos.";
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






        $usuario = new Usuario();
        $usuario->setNome($_POST["nome"]);
        $usuario->setEmail($_POST["email"]);
        $usuario->setPerfil("comum");
        $usuario->setusuario($_POST["usuario"]);
        $usuario->setSenha(md5($_POST["senha"]));
        $usuario->setNivel("1");
        $usuario->setPontuacao("0");
        $usuario->setUrl(md5(uniqid(time())));
        if (UsuarioDAO::add($usuario)) {
            echo "cadastrado";

            @include_once 'MailController.php';
            $mensagem = "Bem vindo ao sistema gamificado para o aprendizado de libras \nPara validar sua conta acesse http://libras.esy.es/?validation=".$usuario->getUrl();
            echo $mensagem;
            MailController::send($usuario->getEmail(), "Bem vindo ao SISLibras", $mensagem);

        } else {
            echo "nao";
        }
    }

}
