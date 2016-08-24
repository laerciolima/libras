<?php

class UsuarioController {

    public function index() {
        // we store all the posts in a variable

        $usuarios = UsuarioDAO::all();
        require_once('views/usuario/index.php');
    }
    
    

    public function delete() {
        // we store all the posts in a variable

        if (!UsuarioDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o usuario!";
        } else {
            $_SESSION['success'] = "Usuario removido com sucesso!";
        }

        return call('usuario', 'index');
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $usuario = UsuarioDAO::find($_GET['id']);
        require_once('views/usuario/view.php');
    }

    public function add() {
        if (isset($_POST['senha'])) {


            $usuario = new Usuario();
            $usuario->setLogin($_POST["login"]);
            $usuario->setSenha($_POST["senha"]);
            if (UsuarioDAO::add($usuario)) {
                $_SESSION['success'] = "Usuario cadastrado com sucesso!";
                header("Location: ?controller=usuario&action=index");
                die();
            } else {
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
        }
        require_once('views/usuario/add.php');
    }

    public function edit() {

        if (isset($_POST['senha'])) {
            $usuario = new Usuario();
            $usuario->setId(base64_decode($_GET['id']));
            $usuario->setLogin($_POST["login"]);
            $usuario->setSenha($_POST["senha"]);

            if (!UsuarioDAO::edit($usuario)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "usuario alterado com sucesso!";
                header("Location: ?controller=usuario&action=index");
                die();
            }
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $usuario = UsuarioDAO::find(base64_decode($_GET['id']));
        require_once('views/usuario/edit.php');
    }
    
    
    public function home(){
        require_once 'views/usuario/home.php';;
    }

}

?>