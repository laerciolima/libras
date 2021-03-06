<?php

class CategoriaController
{

    public function index()
    {
        // we store all the posts in a variable
        if (!isset($_GET['modulo'])) {
            $categorias = CategoriaDAO::all();    
        }else
            $categorias = CategoriaDAO::listByModulo($_GET['modulo']);
            
        require_once 'views/categoria/index.php';

    }
    public function lista()
    {
        // we store all the posts in a variable
        if (!isset($_GET['modulo'])) {
            return call('pages', 'error');
        }

        $usuario_logado = $_SESSION['login_object'];
        $categorias = CategoriaDAO::listByModuloUsuario($_GET['modulo'], $usuario_logado['id']);
        require_once 'views/categoria/lista.php';

    }

    public function delete()
    {
        // we store all the posts in a variable

        if (!CategoriaDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o categoria!";
        } else {
            $_SESSION['success'] = "Categoria removida com sucesso!";
        }

        return call('categoria', 'index');

    }

    public function view()
    {
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }

        // we use the given id to get the right post
        $categoria = CategoriaDAO::find($_GET['id']);
        require_once 'views/categoria/view.php';
    }

    public function add()
    {
        if (isset($_POST['descricao'])) {

            $categoria = new Categoria();
            $categoria->setNome($_POST["nome"]);
            $categoria->setDescricao($_POST["descricao"]);
            $categoria->setFk_id_modulo($_POST["fk_id_modulo"]);
            if (CategoriaDAO::add($categoria)) {
                $_SESSION['success'] = "Categoria cadastrada com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=categoria&action=index&modulo=" . $_POST["fk_id_modulo"] . "\">";

                die();} else {
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }

        }else{
            $modulos = ModuloDAO::listAll();
        }
        require_once 'views/categoria/add.php';
    }

    public function edit()
    {

        if (isset($_POST['descricao'])) {
            $categoria = new Categoria();
            $categoria->setId(base64_decode($_GET['id']));
            $categoria->setNome($_POST["nome"]);
            $categoria->setDescricao($_POST["descricao"]);
            $categoria->setFk_id_modulo($_POST["fk_id_modulo"]);

            if (!CategoriaDAO::edit($categoria)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Categoria alterada com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=categoria&action=index&modulo=" . $_POST["fk_id_modulo"] . "\">";

                die();}

        }

        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }

        // we use the given id to get the right post"

        $categoria = CategoriaDAO::find(base64_decode($_GET['id']));
        require_once 'views/categoria/edit.php';
    }

}
