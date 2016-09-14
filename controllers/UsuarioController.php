<?php

class UsuarioController {

    public function index() {
        // we store all the posts in a variable

        $usuarios = UsuarioDAO::all();
        require_once('views/usuario/index.php');
    }

    public function home() {
        // we store all the posts in a variable
        include_once 'models/ModuloDAO.php';
        
        $modulos = ModuloDAO::all();

        require_once('views/usuario/home.php');
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

    public function ranking() {
        $ranking_geral = UsuarioDAO::rankingGeral();
        require_once('views/ranking/index.php');
    }

    public function amigos() {
        $usuario_logado = $_SESSION['login_object'];
        $amigos = UsuarioDAO::amigos($usuario_logado['id']);
        require_once('views/usuario/amigos.php');
    }

    public function add() {
        if (isset($_POST['email'])) {


            $usuario = new Usuario();
            $usuario->setNome($_POST["nome"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPerfil($_POST["perfil"]);
            $usuario->setusuario($_POST["usuario"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setNivel($_POST["nivel"]);
            $usuario->setPontuacao($_POST["pontuacao"]);
            $usuario->setImagem($_POST["imagem"]);
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
        $usuario_logado = $_SESSION['login_object'];
        if (isset($_POST['nome'])) {
            $usuario = new Usuario();
            $usuario->setId($usuario_logado['id']);
            $usuario->setNome($_POST["nome"]);
            $usuario->setImagem("");

            if (!UsuarioDAO::edit($usuario)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Usuario alterado com sucesso!";
                $usuario_logado['nome'] = $usuario->getNome();
                $usuario_logado['imagem'] = $usuario->getImagem();
                
                $_SESSION['login_object'] = $usuario_logado;
                
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=usuario&action=edit\">";
                die();
            }
        }


        // we use the given id to get the right post"


        $usuario = UsuarioDAO::find(($usuario_logado['id']));

        require_once('views/usuario/edit.php');
    }

}

?>