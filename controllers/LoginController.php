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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-request'])) {
    LoginController::login();
}

class LoginController {

    static function login() {

        $usuario = self::verificarLogin($_POST['login'], $_POST['senha']);
        if ($usuario != "") {
            session_start();
            $_SESSION['login'] = $usuario;

            $_SESSION[md5($usuario)] = $usuario;
            header("Location: ../?controller=usuario&action=home");
            die();
        }
        //header("Location: ../views/login/index.php?login=error");
    }

    static function isLogged() {
        if (!isset($_SESSION['login'])) {
            return false;
        } else if ($_SESSION[md5($_SESSION['login'])] == $_SESSION['login']) {

            return true;
        }
        return true;

    }

    public function logout() {
        unset($_SESSION['login']);
        header("Location: views/login/index.php ");
        die();
    }

    public static function verificarLogin($login, $senha) {
        // we make sure $id is an integer
        @include_once '../connection.php';
        $req = Db::getInstance()->prepare('SELECT * FROM usuario WHERE login = :login and senha = :senha');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":login", $login);
        $req->bindValue(":senha", $senha);
        $req->execute();
        $linha = $req->fetch();

        return $linha['login'];
    }

}
