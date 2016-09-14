<?php

class ModuloController {

    public function index() {
        // we store all the posts in a variable

        $modulos = ModuloDAO::all();
        require_once('views/modulo/index.php');
    }

    public function delete() {
        // we store all the posts in a variable

        if (!ModuloDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o modulo!";
        } else {
            $_SESSION['success'] = "Modulo removido com sucesso!";
        }

        return call('modulo', 'index');
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $modulo = ModuloDAO::find($_GET['id']);
        require_once('views/modulo/view.php');
    }

    public function add() {
        if (isset($_POST['descricao'])) {


            $modulo = new Modulo();
            $modulo->setNome($_POST["nome"]);
            $modulo->setDescricao($_POST["descricao"]);
            $modulo->setNivel($_POST["nivel"]);
            if (ModuloDAO::add($modulo)) {
                $_SESSION['success'] = "Modulo cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=modulo&action=index\">";

                die();
            } else {
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
        }
        require_once('views/modulo/add.php');
    }

    public function edit() {

        if (isset($_POST['descricao'])) {
            $modulo = new Modulo();
            $modulo->setId(base64_decode($_GET['id']));
            $modulo->setNome($_POST["nome"]);
            $modulo->setDescricao($_POST["descricao"]);
            $modulo->setNivel($_POST["nivel"]);

            if (!ModuloDAO::edit($modulo)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Modulo alterado com sucesso!";
                header("Location: ?controller=modulo&action=index");
                die();
            }
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $modulo = ModuloDAO::find(base64_decode($_GET['id']));
        require_once('views/modulo/edit.php');
    }

}

?>