<?php

class CategoriaController {

    public function index() {
        // we store all the posts in a variable
        if(!isset($_GET['modulo'])){
            return call('pages', 'error');
        }
        $categorias = CategoriaDAO::listByModulo($_GET['modulo']);
        require_once('views/categoria/index.php');
        
    }
    public function lista() {
        // we store all the posts in a variable
        if(!isset($_GET['modulo'])){
            return call('pages', 'error');
        }
        $categorias = CategoriaDAO::listByModulo($_GET['modulo']);
        require_once('views/categoria/lista.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!CategoriaDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o categoria!";
        }else{
            $_SESSION['success'] = "Categoria removido com sucesso!"; 
        }

        return call('categoria', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $categoria = CategoriaDAO::find($_GET['id']);
        require_once('views/categoria/view.php');
    }

    public function add() {
        if (isset($_POST['descricao'])) {


            $categoria = new Categoria();
        $categoria->setNome($_POST["nome"]);
        $categoria->setDescricao($_POST["descricao"]);
        $categoria->setImagem($_POST["imagem"]);
        $categoria->setFk_id_modulo($_POST["fk_id_modulo"]);
            if(CategoriaDAO::add($categoria)){
                $_SESSION['success'] = "Categoria cadastrado com sucesso!";
                header("Location: ?controller=categoria&action=index");
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/categoria/add.php');
    }

    public function edit() {

        if (isset($_POST['descricao'])) {
            $categoria = new Categoria();
            $categoria->setId(base64_decode($_GET['id']));
        $categoria->setNome($_POST["nome"]);
        $categoria->setDescricao($_POST["descricao"]);
        $categoria->setImagem($_POST["imagem"]);
        $categoria->setFk_id_modulo($_POST["fk_id_modulo"]);
            
            if (!CategoriaDAO::edit($categoria)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Categoria alterado com sucesso!";
                header("Location: ?controller=categoria&action=index");
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $categoria = CategoriaDAO::find(base64_decode($_GET['id']));
        require_once('views/categoria/edit.php');
    }

}

?>